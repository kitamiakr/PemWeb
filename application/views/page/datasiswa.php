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
						        <th data-sortable="true">Kabupaten</th>
						         <th data-sortable="true">SD/MI</th>
						         <th data-sortable="true">SMP/MTs</th>
						        <th data-sortable="true">SMA/MA</th>
						        <th data-sortable="true">SMK</th>
						         <th data-sortable="true">SLB</th>
						        <th data-sortable="true">Jumlah</th>
						    </tr>
						    </thead>
						    <tbody>
<?php
            $x=0;
                foreach ($dasar as $a)
                    {
                    ?>
            <tr>
                <td><?php echo $a['id'];?></td>
                <td><?php echo anchor('sekolah/sekolah_kab/'.$a['id'],$a['kab']);?></td>
                <td><?php echo $a['jml_sklh'];?></td>
                <td><?php echo $menengah[$x]['jml_sklh'];?></td>
                <td><?php echo $atas[$x]['jml_sklh'];?></td>
                <td><?php echo $kejuruan[$x]['jml_sklh'];?></td>
                <td>
                    <?php
                            foreach ($spesial as $b)
                                {
                                    if($b['id']==$a['id'])
                                    echo $b['jml_sklh'];
                                    else
                                    echo '0';
                                }
                    ?>
                </td>
                <td><?php echo $jumlah[$x]['jml_sklh'];?></td>
            </tr>
                <?php
                $x++;
                    }
                   /// var_dump($menengah);
                ?>
                            </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	</div>