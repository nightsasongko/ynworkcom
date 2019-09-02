  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">ADMIN MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <?php
		$CI = & get_instance();
        $iduser = $_SESSION[$CI->config->item('sess_prefix')."IDSession"];
        $namapage = $_SESSION[$CI->config->item('sess_prefix')."NamaPageSession"];
        $namasubpage = $_SESSION[$CI->config->item('sess_prefix')."NamaSubPageSession"];
        
		?>
		
		<li <?php if($namapage == "dashboard"){ echo "class=\"active\"";}?>> <a href="<?php echo base_url();?>backend/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>



		<?php
        // begin menu PRODUK
        if ($this->dasarlib->apakahBolehMelakukan('PRODUK', 'lihat', $iduser)) {
            if ($namapage == "produk") {
                $isactive = "active";
            } else {
                $isactive = "";
            }
            echo "
                <li class='treeview $isactive'>
                    <a href='#'><i class='fa fa-folder'></i> <span>Produk</span> <i class='fa fa-angle-left pull-right'></i></a>
                    <ul class='treeview-menu'>";

                echo "<li class='";
                if($namasubpage == "kategori_produk")
                {
                    echo "active";
                }
                echo "'>
                            <a href='" . base_url() . "backend/produk/kategori'><i class='fa fa-cubes'></i> <span>Kategori Produk</span></a>
                        </li>";
                echo "<li class='";
                if($namasubpage == "daftar_produk")
                {
                    echo "active";
                }
                echo "'>
                            <a href='" . base_url() . "backend/produk/daftar_produk'><i class='fa fa-cube'></i> <span>Daftar Produk</span></a>
                        </li>";
                echo "<li class='";
                if($namasubpage == "review_produk")
                {
                    echo "active";
                }
                echo "'>
                            <a href='" . base_url() . "backend/produk/review_produk'><i class='fa fa-commenting'></i> <span>Review Produk</span></a>
                        </li>";


            echo"
                    </ul>
                </li>           
            ";
        }
        // end menu PRODUK

        // begin menu MEMBER
        if ($this->dasarlib->apakahBolehMelakukan('MEMBER', 'lihat', $iduser)) {
            if ($namapage == "member") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/member/index'><i class='fa fa-users'></i> <span>Member / Distributor</span></a></li>";
        }
		// end menu MEMBER
		
        // begin menu TRANSAKSI
        if ($this->dasarlib->apakahBolehMelakukan('TRANSAKSI', 'lihat', $iduser)) {
            if ($namapage == "transaksi") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/transaksi/index'><i class='fa fa-dollar'></i> <span>Transaksi</span></a></li>";
        }
        // end menu TRANSAKSI
		
		// begin menu TUTUPPOIN
        if ($this->dasarlib->apakahBolehMelakukan('TUTUPPOIN', 'lihat', $iduser)) {
            if ($namapage == "tutuppoin") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/tutuppoin/index'><i class='fa fa-calendar-times-o'></i> <span>Tutup Poin</span></a></li>";
        }
		// end menu TUTUPPOIN
		
		// begin menu BERITA
        if ($this->dasarlib->apakahBolehMelakukan('BERITA', 'lihat', $iduser)) {
            if ($namapage == "berita") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/berita/index'><i class='fa fa-newspaper-o'></i> <span>Berita Distributor</span></a></li>";
        }
        // end menu BERITA

        // begin menu LAPORAN
        if ($this->dasarlib->apakahBolehMelakukan('LAPORAN', 'lihat', $iduser)) {
            if ($namapage == "laporan") {
                $isactive = "active";
            } else {
                $isactive = "";
            }
            echo "
                <li class='treeview $isactive'>
                    <a href='#'><i class='fa fa-folder'></i> <span>Laporan</span> <i class='fa fa-angle-left pull-right'></i></a>
                    <ul class='treeview-menu'>";

					echo "<li class='";
					if($namasubpage == "penjualan")
					{
						echo "active";
					}
					echo "'>
					<a href='" . base_url() . "backend/laporan/penjualan'><i class='fa fa-bar-chart'></i> <span>Penjualan</span></a>
					</li>";

					echo "<li class='";
					if($namasubpage == "akuisisi_distributor")
					{
						echo "active";
					}
					echo "'>
					<a href='" . base_url() . "backend/laporan/akuisisi_distributor'><i class='fa fa-bar-chart'></i> <span>Akuisisi Distributor</span></a>
					</li>";
                


            echo"
                    </ul>
                </li>           
            ";
        }
        // end menu LAPORAN


        /*

        // begin menu laporan
        if ($this->dasarlib->apakahBolehMelakukan('LAPORAN', 'lihat', $iduser)) {
            if ($namapage == "laporan") {
                $isactive = "active";
            } else {
                $isactive = "";
            }
            echo "
                <li class='treeview $isactive'>
                    <a href='#'><i class='fa fa-bar-chart'></i> <span>Laporan</span> <i class='fa fa-angle-left pull-right'></i></a>
                    <ul class='treeview-menu'>";

                echo "<li>
                            <a href='" . base_url() . "backend/laporan/akuisisi_member'><i class='fa fa-file-text'></i> <span>Akuisisi Member</span></a>
                        </li>";
                echo "<li>
                            <a href='" . base_url() . "backend/laporan/transaksi'><i class='fa fa-file-text'></i> <span>Transaksi</span></a>
                        </li>";

            echo"
                    </ul>
                </li>           
            ";
        }
        // end menu laporan
        */

        // begin menu priviledge
        if (($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS', 'lihat', $iduser)) || ($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN', 'lihat', $iduser)) || ($this->dasarlib->apakahBolehMelakukan('JABATAN', 'lihat', $iduser)) || ($this->dasarlib->apakahBolehMelakukan('PENGGUNA', 'lihat', $iduser))) {
            if ($namapage == "hakakses") {
                $isactive = "active";
            } else {
                $isactive = "";
            }
            echo "
				<li class='treeview $isactive'>
                	<a href='#'><i class='fa fa-cog'></i> <span>Setting Hak Akses</span> <i class='fa fa-angle-left pull-right'></i></a>
              		<ul class='treeview-menu'>";

            if ($this->dasarlib->apakahBolehMelakukan('AREA_TUGAS', 'lihat', $iduser)) {
                echo "<li>
                        	<a href='" . base_url() . "backend/hakakses/areatugas'><i class='fa fa-puzzle-piece'></i> <span>Area Tugas/Module</span></a>
                        </li>";
            }
            /*
            if ($this->dasarlib->apakahBolehMelakukan('DEPARTEMEN', 'lihat', $iduser)) {
                echo "<li>
                        	<a href='" . base_url() . "backend/hakakses/departemen'><i class='fa fa-puzzle-piece'></i> <span>Departemen</span></a>
                        </li>";
            }
            */
            if ($this->dasarlib->apakahBolehMelakukan('JABATAN', 'lihat', $iduser)) {
                echo "<li>
                        	<a href='" . base_url() . "backend/hakakses/jabatan'><i class='fa fa-male'></i> <span>Jabatan</span></a>
                        </li>";
            }
            if ($this->dasarlib->apakahBolehMelakukan('PENGGUNA', 'lihat', $iduser)) {
                echo "<li>
                        	<a href='" . base_url() . "backend/hakakses/pengguna'><i class='fa fa-user'></i> <span>Pengguna/User</span></a>
                        </li>";
            }

            echo"
              		</ul>
            	</li>			
			";
        }
        // end menu priviledge



        // begin menu audit trail
        if ($this->dasarlib->apakahBolehMelakukan('AUDIT_TRAIL', 'lihat', $iduser)) {
            if ($namapage == "audittrail") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/dashboard/audit_trail'><i class='fa fa-barcode'></i> <span>Audit Trail</span></a></li>";
        }
        // end menu audit trail        
		
        // begin menu maintenance
        if ($this->dasarlib->apakahBolehMelakukan('MAINTENANCE', 'lihat', $iduser)) {
            if ($namapage == "maintenance") {
                $isactive = "class=active";
            } else {
                $isactive = "";
            }

            echo "<li $isactive><a href='" . base_url() . "backend/dashboard/maintenance'><i class='fa fa-close'></i> <span>Maintenance</span></a></li>";
        }
        // end menu maintenance		
		
		?>        
        
        
        
        
        
        
        
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
