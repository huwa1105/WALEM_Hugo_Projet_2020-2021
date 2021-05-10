<?php
include('./lib/php/classes/Film.class.php');
include('./lib/php/classes/FilmBD.class.php');

$cnx = Connexion::getInstance($dsn, $user, $password);
$film = array();
$films = new FilmBD($cnx);

$listefilm = $films->getAllFilm();
$nbr = count($listefilm);

include('./lib/php/TCPDF/tcpdf.php');

$pdf = new TCPDF('P', 'mm', 'A4');
$pdf->SetMargins(0, 0, 0);
$pdf->setHeaderMargin(0);
$pdf->setFooterMargin(0);

$pdf->AddPage();

$pdf->setFont('courier', '', '12');
$pdf->SetTextColor('0', '0', '0');

$x = 0;
$y = 20;
$pdf->SetTitle('FILM');
$pdf->Cell(0, 30, 'FILM EN QUESTION', 1, 0, 'C');
$pdf->setPage(1, true);
$pdf->SetY(50);

for($i = 0; $i < 1; $i++){
    $pdf->Text($x + 10, $y, 'ID');
    $pdf->Text($x + 20, $y, 'Nom du film');
    $pdf->Text($x + 130, $y, 'Realisateur');

    $y += 10;
}

for($i = 0; $i < $nbr; $i++){
    $pdf->Text($x + 10, $y, $listefilm[$i]->id_film);
    $pdf->Text($x + 20, $y, $listefilm[$i]->nom);
    $pdf->Text($x + 130, $y, $listefilm[$i]->realisateur);

    $y += 10;
}

ob_end_clean();
$pdf->Output('FILM.pdf', 'D');
