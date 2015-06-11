<?php foreach($employees as $employees):?>
	<tr>
		<td align='center'><a href="<?php echo $libs->page('img').'/'.$employees->strpicture ?>" target="_blank" title='click to enlarge'><img src="<?php echo $libs->page('img').'/'.$employees->strpicture ?>" height='35px' width='auto'></a></td>
		<td><?php echo $employees->stridnumber; ?></td>
		<td><?php echo strtoupper($employees->strfullname); ?></td>
		<td <?php 
				$strcompany=$employees->strcompany; 
				echo ($strcompany=="SkyKitchen")? "style='background-color:#e73e97'": "style='background-color:#e51b24'" ?>>
			<?php echo $strcompany; ?>
		</td>
		<td><?php echo $employees->strdepartment; ?></td>
		<td><?php echo $employees->strposition; ?></td>
		<td><?php echo $employees->strdateofhire; ?></td>
		<td align='center'><button id="<?php echo $employees->ID; ?>">Details</button> </td>
	</tr>
<?php endforeach; ?>