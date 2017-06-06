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
						         <th data-sortable="true">SD/MI</th>
						         <th data-sortable="true">SMP/MTs</th>
						         <th data-sortable="true">SMA/MA</th>
						        <th data-sortable="true">SMK</th>
						        <th data-sortable="true">SLB</th>
						    </tr>
						    </thead>
						    <tbody>
<?php
            //var_dump($awal); gawe ngecek isine array
            $x=0;
                foreach ($awal as $a)
                    {$x++;
                    ?>
            <tr>
                <td><?php echo $x;?></td>
                <td><?php echo anchor('sekolah/skl_sekolah/'.$a['id'],$a['kec']);?></td>
                <td><?php
                                $v=0;
                            foreach ($dasar as $e)
                                {
                                    if($e['id']==$a['id']){$v++;
                                    echo $e['jumlah'];}
                                }
                                if($v==0)
                                    {
                                    echo '0';
                                    }
                    ?></td>
                <td><?php
                                $v=0;
                            foreach ($menengah as $e)
                                {
                                    if($e['id']==$a['id']){$v++;
                                    echo $e['jumlah'];}
                                }
                                if($v==0)
                                    {
                                    echo '0';
                                    }
                    ?></td>
                <td><?php
                                $v=0;
                            foreach ($atas as $d)
                                {
                                    if($d['id']==$a['id']){$v++;
                                    echo $d['jumlah'];}
                                }
                                if($v==0)
                                    {
                                    echo '0';
                                    }
                    ?></td>
                <td><?php
                                $v=0;
                            foreach ($kejuruan as $c)
                                {
                                    if($c['id']==$a['id']){$v++;
                                    echo $c['jumlah'];}
                                }
                                if($v==0)
                                    {
                                    echo '0';
                                    }
                    ?></td>
                 <td><?php
                                $v=0;
                            foreach ($spesial as $b)
                                {
                                    if($b['id']==$a['id']){$v++;
                                    echo $b['jumlah'];}
                                }
                                if($v==0)
                                    {
                                    echo '0';
                                    }
                    ?></td>
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