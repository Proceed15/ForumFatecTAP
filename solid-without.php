<?php

class NotificationService {

    public function sendEmail($email, $message) {
        echo "Enviado e-mail para $email: $message";
    }
    
    public function sendSMS($phoneNumber, $message) {
        echo "Enviado SMS para $phoneNumber: $message";
    }

    public function notify($user, $message) {
        if (!empty($user['email'])) {
            $this->sendEmail($user['email'], $message);
        }
        
        if (!empty($user['phone'])) {
            $this->sendSMS($user['phone'], $message);
        }
    }
    
}

$notificationService = new NotificationService();
$user = [
    'email' => 'user@dominio.com',
    'phone' => '1511223344'
];
$notificationService->notify($user, "<br />Bem vindo ao sistema!<hr />");
