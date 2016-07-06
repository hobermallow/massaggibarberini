<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 




//PER ESEGUIRE OGNI FUNZIONE E' NECESSARIO UN Google_Service_Drive ($g_drive) PASSATO COME ARGOMENTO!!!
class google_drive {
	
	//crea una folder nella root del drive
	public function crea_folder_nella_root( $g_drive, $nome_folder )
	{
		$file = new Google_Service_Drive_DriveFile();
		$file->setTitle($nome_folder);
		//$file->setDescription($description);
		$file->setMimeType('application/vnd.google-apps.folder');
		
		$createdFile = $g_drive->files->insert($file, array(
			'mimeType' => 'application/vnd.google-apps.folder',
		));

		
		return $createdFile;
	}
	
	//elimina un file a partire dal suo id
	public function elimina_file( $g_drive, $file_id )
	{
		$result = $g_drive->files->delete( $file_id );
		
		return true;
	}
	
	//ritorna la lista dei files in una cartella o nella root del drive
	public function list_files( $g_drive, $id_parent_folder = false )
	{
		$result = array();
		
		$risultati = array();
		
		if( $id_parent_folder == false )
		{
			//mi serve la lista dei files nella root folder
			
			//$parameters = array( array('q' => "'<FOLDER_ID>' in parents") );
			$parameters = array( array('q' => "'root' in parents and trashed=false", 'maxResults' => 99999, 'location' => NULL, 'type' => NULL) );
			
			$files = $g_drive->files->listFiles($parameters);
			
			$result = array_merge($result, $files->getItems());
			
			//print_r($result[0]); die();
			
			/*
			REGOLE:
			
			[kind] => drive#file
			[explicitlyTrashed] => 0 //1= trashed
			
			*/
			

			foreach( $result as $risultato )
			{
				$parents = $risultato->getParents();
				
				//aggiunto ai risultati finali il file solo se rispetta i requisiti
				if( $parents[0]->isRoot == 1 && $risultato->kind == "drive#file" && (int)$risultato->explicitlyTrashed == 0 && $risultato->mimeType != "application/vnd.google-apps.folder"  ) $risultati[] = $risultato;
			}
			
			
		}//if
		else
		{
			//allora i serve la lista dei files nella cartella con id passato come parametro
			
			$parameters = array( array('q' => "'".$id_parent_folder."' in parents and trashed=false", 'maxResults' => 99999, 'location' => NULL, 'type' => NULL) );
			
			$files = $g_drive->files->listFiles($parameters);
			
			$result = array_merge($result, $files->getItems());
			
			foreach( $result as $risultato )
			{	
				$parents = $risultato->getParents();
				
				//aggiunto ai risultati finali il file solo se rispetta i requisiti
				if( $parents[0]->id == $id_parent_folder && $risultato->kind == "drive#file" && (int)$risultato->explicitlyTrashed == 0 && $risultato->mimeType != "application/vnd.google-apps.folder"  ) $risultati[] = $risultato;
			}
			
		}//else
		
		
		return $risultati;
			
	}//function list_files
	
	
	//inserisce un file in google drive dati i parametri passati. ritorna il file creato o l'output di errore.
	public function insert_file( $g_drive, $title, $description, $path, /*$mimeType, $uploadType,*/ $id_parent_folder = false )
	{
		$file = new Google_Service_Drive_DriveFile();
		$file->setTitle($title);
		$file->setDescription($description);
		//$file->setMimeType('image/png');
		
		
		if( $id_parent_folder != false )
		{
			//allora devo inserire il file dentro questa cartella passata come argomento
			$parent = new Google_Service_Drive_ParentReference();
			$parent->setId($id_parent_folder);
			$file->setParents(array($parent));
			
			$data = file_get_contents($path);
			
			$createdFile = $g_drive->files->insert($file, array(
				'data' => $data,
				'mimeType' => 'application/octet-stream',
				'uploadType' => 'multipart'
			));
		}
		else
		{
			//allora devo inserire il file nella root di drive
			
			$data = file_get_contents($path);
			
			$createdFile = $g_drive->files->insert($file, array(
				'data' => $data,
				'mimeType' => 'application/octet-stream',
				'uploadType' => 'multipart'
			));
			
		}
		
		return $createdFile;
		
	}//function insert_file


	//cerca una folder nel drive con lo stesso nome passato come argomento, ritorna false in caso di fallimento, altrimenti ritorna tutte le info sulla cartella in questione
 	public function search_folder( $g_drive, $nome_cartella )
	{
		
		//cercare una folder
		$result = array();
		try {
		  $parameters = array( "q" => "title contains '".$nome_cartella."'" );
		  
		  $files = $g_drive->files->listFiles($parameters);
	
		  $result = array_merge($result, $files->getItems());
		  
		  //$titolo_cartella = $result[0]->title;
		  //$id_cartella = $result[0]->id;

		  //print_r($result);
		  
		  if( isset($result[0]) && $result[0]->title == $nome_cartella ) return $result[0];
		  else return false;
		  
		} catch (Exception $e) {
		  print "An error occurred: " . $e->getMessage();
		  $pageToken = NULL;
		}
		
	}//function search_folder
	
}






































