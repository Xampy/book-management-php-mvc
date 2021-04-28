<?php
	

	/**
	 * Handle the user file
	 * 
	 * Rename the file and return the file new name
	 * @param {string } $input_name file key name in the array
	 * @param {string} $username
	 *
	*/
	function handleFile(string $input_name, string $username){
		

		//print_r($_FILES);
		//print_r($_SERVER);
		//print_r(__DIR__);

		$target_dir =   $_SERVER["DOCUMENT_ROOT"] . "/app/bookoob/storage/public/uploads/";//"../../storage/public/uploads/";
		$temp = explode('.', $_FILES[$input_name]['name']);
		$filename = ( (string)time() ) . $username . '.' . end($temp);
		$target_file = $target_dir . basename( $_FILES[$input_name]['name'] );

		$isUploaded = true;

		$fileDataType = strtolower(
			pathinfo( $target_file, PATHINFO_EXTENSION )
		);

		echo "<br/> Extension du fichier " . $fileDataType;

		$check = getimagesize(
			$_FILES[$input_name]["tmp_name"]
		);


		if ( $check != false ) {
			echo "Nous avons une image " . $check['mime'];
			$isUploaded = true;
		}else {
			$isUploaded = false;
			echo "Ce n'est pas une image";
		}


		if ( $isUploaded ) {
			
			$result = move_uploaded_file($_FILES[$input_name]['tmp_name'], $target_dir . $filename);

			if ( $result ) {
				
				echo "File uploaded " . htmlspecialchars(
					$_FILES[$input_name]['name']
				);

				echo "<img src='../../storage/public/uploads/" . $_FILES[$input_name]['name'] . "'/>";

				return $filename;
			}else {
				echo "Problem while uploading file.";

			}	


		}

		//Error occurred
		return null;
	}