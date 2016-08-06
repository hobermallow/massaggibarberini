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

    public function printFatturaVisita($datiFatturazione, $datiVisita, $type, $path) {
    	//ricavo i dati della visita e del paziente
    	$nomeCliente = $datiVisita->nome_paziente;
    	$indirizzoCliente = $datiVisita->indirizzo;
    	$cfCliente = $datiVisita->codice_fiscale;
    	$telCliente = $datiVisita->telefono;
    	$data_visita = $datiVisita->data_visita;
    	//dettaglio della visita o nome della prestazione
    	$descrizione = $datiVisita->descrizione ? $datiVisita->descrizione : $datiVisita->prestazione;
    	$totale = "Totale: ".$datiVisita->prezzo." €";
    	
        $this->SetMargins(15, 10, -1, true);
        $this->AddPage();
        $this->SetY(20);
        
        //dati di chi emette la fattura
        $nome = $datiFatturazione->intestazione;
        $indirizzo = $datiFatturazione->indirizzo;
        $cap = $datiFatturazione->cap . " " . $datiFatturazione->comune . " (" . $datiFatturazione->provincia . ")";
        $iva = $datiFatturazione->piva;
        $tel = $datiFatturazione->telefono;
        $this->MultiCell(0, 10, $nome . "\n" . $indirizzo . "\n" . $cap . "\nPartita IVA" . $iva . "\nTelefono:" . $tel . "\n", 0, "");
        $this->SetY(20);
        $this->SetX(-75);
        $this->writeHTML("<b> Fattura del </b>" . $data_visita);
        $this->SetX(-75);
        $this->writeHTML("<b> Cliente</b>");
        $this->SetX(-75);

//         $totale = "Totale: " . $totale . "€";
        $this->MultiCell(0, 10, $nomeCliente . "\n" . $indirizzoCliente . "\n" . $cfCliente . "\n" . $telCliente . "\n", 0, "");
        $this->SetY(80);
        $this->writeHTML("<b> Riepilogo</b>");
        $riepilogo = "";
        $riepilogo .= "Data:  " . $data_visita . PHP_EOL."Sevizio: " . $descrizione;
        $riepilogo.=PHP_EOL;
        $this->MultiCell(0, 10, $riepilogo . PHP_EOL, 0, "");

        $this->SetY(-80);
        $this->SetX(-75);
        $this->MultiCell(0, 10, $totale, "B", "C");
       
	
        $this->Output($path."/fattura-".$data_visita."-".implode("-", explode(" ", $nomeCliente)).".pdf", $type);
    }

}

$fattura = new fattura();
$fattura->printFatturaVisita($datiFatturazione, $datiVisita, $type, $path);
