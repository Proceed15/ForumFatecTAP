<?php

interface ReportMedia {
    public function setTitle($title);
    public function setContent($content);
    public function printReport();
}

class PDFReport implements ReportMedia {

    private $title;
    private $content;

    public function setTitle($title) {
        $this->title = "PDF: " . $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function printReport() {
        echo($this->title . "<br>" . $this->content . "<hr />");
    }

}



class CSVReport implements ReportMedia {

    private $title;
    private $content;

    public function setTitle($title) {
        $this->title = "CSV: " . $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }

    public function printReport() {
        echo($this->title . "<br>" . $this->content . "<hr />");
    }

}

class Report {

    private $reportMedia;

    public function __construct (ReportMedia $reportMedia) {
        $this->reportMedia = $reportMedia;
    }

    public function generate($title, $content) {
        $this->reportMedia->setTitle($title);
        $this->reportMedia->setContent($content);
        $this->reportMedia->printReport();
    }

}

$report1 = new Report(new PDFReport());
$report1->generate("Nome dos alunos", "João, José, Davi, Enrico, Kenui, etc...");

$report2 = new Report(new CSVReport());
$report2->generate("Nome dos alunos", "João, José, Davi, Enrico, Kenui, etc...");


?>