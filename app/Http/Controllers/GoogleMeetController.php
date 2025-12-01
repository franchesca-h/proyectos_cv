<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Google\Client as GoogleClient;
use Google\Service\Calendar as GoogleCalendar;

/**
 * Controlador para la integración con Google Meet
 * 
 * Este controlador maneja la creación de reuniones de Google Meet
 * mediante la API de Google Calendar. Utiliza Service Account para autenticación.
 */
class GoogleMeetController extends Controller
{
    /**
     * Obtiene un cliente de Google configurado
     * 
     * @return GoogleClient
     */
    private function getClient()
    {
        $client = new GoogleClient();
        $client->setApplicationName(config('app.name'));
        $client->setScopes(GoogleCalendar::CALENDAR);
        $client->setAuthConfig(storage_path(env('GOOGLE_SERVICE_ACCOUNT_SECRET_PATH')));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        return $client;
    }

    /**
     * Redirige al usuario a Google para autenticación
     */
    public function redirectToGoogle()
    {
        $client = $this->getClient();
        return redirect($client->createAuthUrl());
    }

    /**
     * Maneja el callback de Google después de la autenticación
     */
    public function handleGoogleCallback(Request $request)
    {
        $client = $this->getClient();
        $token = $client->fetchAccessTokenWithAuthCode($request->code);
        session(['google_access_token' => $token]);
        return redirect()->route('google.meet.create');
    }

    /**
     * Crea una reunión y muestra la vista
     */
    public static function createMeeting()
    {
        $meetLink = self::createMeetLinkStatic();
        return view('google.meet', compact('meetLink'));
    }

    /**
     * Crea y devuelve un enlace de Google Meet.
     * 
     * @param string $professionalName Nombre del profesional
     * @param string $professionalEmail Email del profesional
     * @param string $clientName Nombre del cliente
     * @param string $clientEmail Email del cliente
     * @param string $startTime Fecha y hora de inicio (formato datetime)
     * @return string|null URL de Google Meet o null si hay error
     */
    public static function createMeetLinkStatic($professionalName, $professionalEmail, $clientName, $clientEmail, $startTime)
    {
        try {
            $client = new \Google\Client();
            $client->setApplicationName(config('app.name'));
            $client->setAuthConfig(storage_path(env('GOOGLE_SERVICE_ACCOUNT_SECRET_PATH')));
            $client->setScopes([\Google\Service\Calendar::CALENDAR]);
            $client->setAccessType('offline');
            $client->setSubject(env('GOOGLE_MAIN_ACCOUNT'));

            $service = new \Google\Service\Calendar($client);

            // Parsear inicio y calcular fin (+1 hora)
            $start = Carbon::parse($startTime)->timezone(config('app.timezone'));
            $end   = $start->copy()->addHours(1);
            
            $event = new \Google\Service\Calendar\Event([
                'summary' => "Reunión de consultoría",
                'description' => 'Este es tu espacio de consultoría, pensado para trabajar en lo que necesites. Te sugiero buscar un lugar tranquilo y con buena conexión. Todo lo que compartas aquí es confidencial.',
                'start' => [
                    'dateTime' => $start->toRfc3339String(),
                    'timeZone' => config('app.timezone'),
                ],
                'end' => [
                    'dateTime' => $end->toRfc3339String(),
                    'timeZone' => config('app.timezone'),
                ],
                'attendees' => [
                    ['email' => $professionalEmail],
                    ['email' => $clientEmail],
                ],
                'conferenceData' => [
                    'createRequest' => [
                        'requestId' => uniqid(),
                        'conferenceSolutionKey' => ['type' => 'hangoutsMeet'],
                    ],
                ],
            ]);

            $createdEvent = $service->events->insert(
                'primary',
                $event,
                ['conferenceDataVersion' => 1, 'sendUpdates' => 'all']
            );

            return $createdEvent->getConferenceData()->getEntryPoints()[0]->getUri();

        } catch (\Throwable $e) {
            \Log::error('Error al crear Google Meet: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Devuelve un cliente de Google configurado (versión estática).
     * 
     * @return GoogleClient
     */
    private static function getClientStatic()
    {
        $client = new GoogleClient();
        $client->setApplicationName(config('app.name'));
        $client->setScopes(GoogleCalendar::CALENDAR);
        $client->setAuthConfig(storage_path(env('GOOGLE_SERVICE_ACCOUNT_SECRET_PATH')));
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));

        return $client;
    }
}

