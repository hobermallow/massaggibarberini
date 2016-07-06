<?php

class fattura extends TCPDF {

    public function Header() {
        $this->SetMargins(15, 5, -1, true);
        // Logo

        $image_file = FCPATH . 'assets/logo_default.png';

        $this->Image($image_file, 15, 0, '', 15, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 8);
    }

    // Page footer
    public function Footer() {
        $this->SetMargins(15, 10, -1, true);
        $this->SetY(-10);
        $style = array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(85, 85, 85));

        $this->Line(15, 285, 198, 285, $style);
        $this->SetFont('helvetica', '', 8);
        //$this->writeHTML('<b>ottodue.com è un marchio di ADV CREA SRL</b> via marcello, 24d 84085 M. S. Severino SA - p. iva 04735320659');
    }

    public function printFattura($datiFatt, $datiVisitaCliente, $type) {
        $this->SetMargins(15, 10, -1, true);
        foreach ($datiVisitaCliente as $datiCliente) {
            $dataVisita = $datiCliente->data_visita;
            $nomeCliente = $datiCliente->nome_paziente;
            $indirizzoCliente = $datiCliente->indirizzo;
            $cfCliente = $datiCliente->codice_fiscale;
            $telCliente = $datiCliente->telefono;
            $totale = $datiCliente->totale;
        }
        $this->AddPage();
        $this->SetY(20);
        $nome = $datiFatt->intestazione;
        $indirizzo = $datiFatt->indirizzo;
        $cap = $datiFatt->cap . " " . $datiFatt->comune . " (" . $datiFatt->provincia . ")";
        $iva = $datiFatt->piva;
        $tel = $datiFatt->telefono;
        $this->MultiCell(0, 10, $nome . "\n" . $indirizzo . "\n" . $cap . "\nPartita IVA" . $iva . "\nTelefono:" . $tel . "\n", 0, "");
        $this->SetY(20);
        $this->SetX(-75);
        $this->writeHTML("<b> Fattura del </b>" . $dataVisita);
        $this->SetX(-75);
        $this->writeHTML("<b> Cliente</b>");
        $this->SetX(-75);

        $totale = "Totale: " . $totale . "€";
        $this->MultiCell(0, 10, $nomeCliente . "\n" . $indirizzoCliente . "\n" . $cfCliente . "\n" . $telCliente . "\n", 0, "");
        $this->SetY(80);
        $this->writeHTML("<b> Riepilogo</b>");
        $riepilogo = "";
        foreach ($datiVisitaCliente as $datiCliente) {
            $riepilogo .= "Visita del " . $datiCliente->data_visita . ": " . ($datiCliente->dettaglio ? $datiCliente->dettaglio : $datiCliente->descrizione);
            $riepilogo.=PHP_EOL;
        }
        $this->MultiCell(0, 10, $riepilogo . PHP_EOL, 0, "");

        $this->SetY(-80);
        $this->SetX(-75);
        $this->MultiCell(0, 10, $totale, "B", "C");

        $this->Output(FCPATH . "/assets/fattura-" . $datiCliente->data_visita . ".pdf", $type);
    }

}

$fattura = new fattura();
$fattura->printFattura($datiFatturazione[0], $datiPreventivo, $type);
