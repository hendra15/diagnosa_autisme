<?php
	include_once("koneksi/conn.php");


?>							
							<table id="tabel" class="table" width="90%">
								<tr>
									
									<th>No</th>
									<th>Spesialisasi</th>
									<th colspan="2"><p align="center">Menu</p></th>
								</tr>
								<?php	
									$no=1;
									$sql=mysql_query("select * from spesialisasi order by spesialisasi asc");
									while($rs=mysql_fetch_array($sql)){
										$id=$rs['ID_SPESIALISASI'];
										$spesial=$rs['SPESIALISASI'];
										echo"<tr>
												<td><p align=\"center\">$no</p></td>
												<td><p align=\"center\">$spesial</p></td>
												<td><p align=\"center\"><a href=\"Javascript:set_data('$id','$spesial');\">Perbarui</a></p></td>
												<td><p align=\"center\"><a href=\"Javascript:hapus_spesial('$id','$spesial');\">Hapus</a></p></td>
												
											</tr>";
											$no++;
									}
								?>
							</table>