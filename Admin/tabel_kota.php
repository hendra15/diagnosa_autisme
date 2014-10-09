<?php
	include_once("koneksi/conn.php");


?>							
							<table id="tabel" class="table" width="90%">
								<tr>
									
									<th>No</th>
									<th><p align="center">Kota</p></th>
									<th colspan="2"><p align="center">Menu</p></th>
								</tr>
								<?php	
									$no=1;
									$sql=mysql_query("select * from id_kota order by kota asc");
									while($rs=mysql_fetch_array($sql)){
										$id=$rs['ID_KOTA'];
										$kota=$rs['KOTA'];
										echo"<tr>
												<td><p align=\"left\">$no</p></td>
												<td><p align=\"left\">$kota</p></td>
												<td><p align=\"center\"><a href=\"Javascript:set_data('$id','$kota');\">Perbarui</a></p></td>
												<td><p align=\"center\"><a href=\"Javascript:hapus_kota('$id','$kota');\">Hapus</a></p></td>
												
											</tr>";
											$no++;
									}
								?>
							</table>