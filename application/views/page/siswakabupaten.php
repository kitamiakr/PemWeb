<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sekolah</h1>
			</div>
		</div><!--/.row-->
				
	
		
	<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Data Siswa</div>
					<div class="panel-body">
						<div class="pull-right">
							<a href="#!" class="btn btn-success" ><span class="glyphicon glyphicon-print"></span> Print to Excel</a>
							<a href="#!" class="btn btn-success" ><span class="glyphicon glyphicon-print"></span> Print </a>
						</div>
						<br>
						<br>
						<table data-toggle="table" data-url="#"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" id="tebel">
						    <thead>
						    <tr>
						        <th data-sortable="true">No</th>
						        <th data-sortable="true">Kecamatan</th>
						         <th data-sortable="true">Jumlah Siswa</th>
						         <th data-sortable="true">Jumlah Laki-laki</th>
						        <th data-sortable="true">Jumlah Perempuan</th>
						    </tr>
						    </thead>
						    <tbody>
<?php
            //var_dump($kec_sklh); gawe ngecek isine array
            $x=0;
                foreach ($kec_sklh as $a)
                    {$x++;
                    ?>
            <tr>
                <td><?php echo $x;?></td>
                <td><?php echo anchor('sekolah/skl_siswa/'.$a['id_kec'],$a['kec']);?></td>
                <td><?php echo $a['jumlah'];?></td>
                <td><?php echo $a['putra'];?></td>
                <td><?php echo $a['putri'];?></td>
            </tr>
                <?php
                    }
                ?>
                            </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	</div>