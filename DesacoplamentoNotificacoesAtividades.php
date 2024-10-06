<?php

interface NotificationService {
    public function setTitle($title);
    public function setContent($content);
    public function printNotificationService();
}

class emailNotification implements NotificationService {

    private $title;
    private $content;

    public function setTitle($title) {
        $this->title = "E-mail: " . $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function printNotificationService() {
        echo($this->title . "<br>" . $this->content . "<hr />");
    }

}



class smsNotification implements NotificationService {

    private $title;
    private $content;

    public function setTitle($title) {
        $this->title = "SMS: " . $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function printNotificationService() {
        echo($this->title . "<br>" . $this->content . "<hr />");
    }

}

class pushNotification implements NotificationService {
    private $title;
    private $content;
    public function setTitle($title) {
        $this->title = "Push Notification: ". $title;
    }
    public function setContent($content) {
        $this->content = $content;
    }
    public function printNotificationService() {
        echo($this->title . "<br>" . $this->content . "<hr />");
    }
    
}

class NotificationSender {

    private $NotificationService;

    public function __construct (NotificationService $NotificationService) {
        $this->NotificationService = $NotificationService;
    }

    public function send($title, $content) {
        $this->NotificationService->setTitle($title);
        $this->NotificationService->setContent($content);
        $this->NotificationService->printNotificationService();
    }

}

$NotificationSender1 = new NotificationSender(new emailNotification());
$NotificationSender1->send("Enviando E-mail com a mensagem: ", "Olá, esta é uma notificação por E-mail!");

$NotificationSender2 = new NotificationSender(new smsNotification());
$NotificationSender2->send("Enviando SMS com a mensagem: ", "Olá, esta é uma notificação por SMS!");

$NotificationSender3 = new NotificationSender(new pushNotification());
$NotificationSender3->send("Enviando Push Notification com a mensagem: ", "Olá, esta é uma notificação por Push Notification!");
?>