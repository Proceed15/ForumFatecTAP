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
$notificationService->notify($user, "<br />Bem vindo ao sistema!<hr />");<?php

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
$notificationService->notify($user, "<br />Bem vindo ao sistema!<hr />");<?php

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
$notificationService->notify($user, "<br />Bem vindo ao sistema!<hr />");<?php

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
$notificationService->notify($user, "<br />Bem vindo ao sistema!<hr />");<?php

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
$notificationService->notify($user, "<br />Bem vindo ao sistema!<hr />");<?php

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
$notificationService->notify($user, "<br />Bem vindo ao sistema!<hr />");<?php

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
$notificationService->notify($user, "<br />Bem vindo ao sistema!<hr />");<?php

# I - D
interface NotificationChannel {
    public function send($recipient, $message);
}

# S
class EmailNotification implements NotificationChannel {
    public function send($recipient, $message) {
        echo "Enviado e-mail para $recipient: $message";
    }
}

class SMSNotification implements NotificationChannel {
    public function send($recipient, $message) {
        echo "Enviado SMS para $recipient: $message";
    }
}

# O L

class NotificationService {

    private $channels = [];

    public function addChannel(NotificationChannel $channel) {
        $this->channels[] = $channel;
    }

    public function notify($user, $message) {
        foreach ($this->channels as $channel) {
            if (!empty($user['email']) && $channel instanceof EmailNotification) {
                $channel->send($user['email'], $message);
            }
            
            if (!empty($user['phone']) && $channel instanceof SMSNotification) {
                $channel->send($user['phone'], $message);
            }
        }
    }
}


$notificationService = new NotificationService();

$notificationService->addChannel(new EmailNotification());
$notificationService->addChannel(new SMSNotification());

$user = [
    'email' => 'user@dominio.com',
    'phone' => '1511223344'
];
$notificationService->notify($user, "<br />Bem vindo ao sistema!<hr />");
?>
