						<!-- Side Navigation -->
						<div class="content-side content-side-full">
						    <ul class="nav-main">
						        <!--Akses Menu Untuk Admin-->
						        <?php if ($this->session->userdata('akses') == '1') : ?>
						            <li>
						                <a class="active" href="<?php echo base_url() . 'admin/dashboard' ?>"><i class="si si-screen-desktop"></i><span class="sidebar-mini-hide">Dashboard</span></a>
						            </li>
						            <li>
						                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-pin"></i><span class="sidebar-mini-hide">Article</span></a>
						                <ul>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/tulisan/add_tulisan' ?>">Add New</a>
						                    </li>

						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/tulisan' ?>">Post</a>
						                    </li>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/kategori' ?>">Categories</a>
						                    </li>

						                </ul>
						            </li>
						            <li>
						                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-pin"></i><span class="sidebar-mini-hide">Content</span></a>
						                <ul>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/slider' ?>">Image Slider</a>
						                    </li>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/tentangki' ?>">Tentang KI</a>
						                    </li>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/fasilitas' ?>">Layanan KI</a>
						                    </li>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/konten01' ?>">Konten 01</a>
						                    </li>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/events' ?>">Event</a>
						                    </li>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/contact' ?>">Info Contact</a>
						                    </li>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/pustaka' ?>">Pusataka Digital</a>
						                    </li>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/kegiatan' ?>">Kegiatan</a>
						                    </li>
						                </ul>
						            </li>
						            <li>
						                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-pin"></i><span class="sidebar-mini-hide">LAYANAN KI</span></a>
						                <ul>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/merek' ?>">Merek</a>
						                    </li>

						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/hakcipta' ?>">Hak Cipta</a>
						                    </li>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/desainind' ?>">Desain Industri</a>
						                    </li>

						                </ul>
						            </li>

						            <li>
						                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-pin"></i><span class="sidebar-mini-hide">BERITA</span></a>
						            <li>
						                <a href="<?php echo base_url() . 'admin/dashboard/konten01' ?>">TERBARU</a>
						            </li>
						            </li>





						            <li>
						                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-pin"></i><span class="sidebar-mini-hide">USER</span></a>
						                <ul>
						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/pengguna' ?>">Setting</a>
						                    </li>

						                    <li>
						                        <a href="<?php echo base_url() . 'admin/dashboard/inbox' ?>">Message</a>
						                    </li>
						                </ul>
						            </li>
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/slider' ?>"><i class="si si-picture"></i><span class="sidebar-mini-hide">Image Slider</span></a>
                                </li> -->
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/room' ?>"><i class="si si-star"></i><span class="sidebar-mini-hide">Download</span></a>
                                </li> -->
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/fasilitas' ?>"><i class="si si-badge"></i><span class="sidebar-mini-hide">Layanan HKI</span></a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/konten01' ?>"><i class="si si-badge"></i><span class="sidebar-mini-hide">Konten 01</span></a>
                                </li> -->
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/merek' ?>"><i class="si si-badge"></i><span class="sidebar-mini-hide">Merek</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/hakcipta' ?>"><i class="si si-umbrella"></i><span class="sidebar-mini-hide">Hak Cipta</span></a>
                                </li>
                                 <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/desainind' ?>"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Desain Industri</span></a>
                                </li> -->
						            <!-- <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-cup"></i><span class="sidebar-mini-hide">Restaurant</span></a>
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url() . 'admin/dashboard/schedule' ?>">Schedule</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url() . 'admin/dashboard/menu' ?>">Menu</a>
                                        </li>
        
                                    </ul>
                                </li> -->
						            <!--  <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/events' ?>"><i class="si si-calendar"></i><span class="sidebar-mini-hide">Events</span></a>
                                </li> -->
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/inbox' ?>"><i class="si si-envelope"></i><span class="sidebar-mini-hide">Inbox</span></a>
                                </li> -->
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/contact' ?>"><i class="si si-call-end"></i><span class="sidebar-mini-hide">Info Contact</span></a>
                                </li> -->
						            <!--  <li>
                                    <a href="<?php echo base_url() . 'admin/pengguna' ?>"><i class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
                                </li> -->
						            <!--Akses Menu Untuk Admin Akses 2-->
						        <?php elseif ($this->session->userdata('akses') == '2') : ?>
						            <li>
						                <a class="active" href="<?php echo base_url() . 'admin/dashboard' ?>"><i class="si si-screen-desktop"></i><span class="sidebar-mini-hide">Dashboard</span></a>
						            </li>
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/pengguna' ?>"><i class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
                                </li>
                                 -->
						            <li>
						                <a href="<?php echo base_url() . 'admin/dashboard/merek' ?>"><i class="si si-badge"></i><span class="sidebar-mini-hide">Merek</span></a>
						            </li>
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/pengguna' ?>"><i class="si si-globe"></i><span class="sidebar-mini-hide">Indikasi Geografis</span></a>
                                </li> -->
						            <li>
						                <a href="<?php echo base_url() . 'admin/dashboard/hakcipta' ?>"><i class="si si-umbrella"></i><span class="sidebar-mini-hide">Hak Cipta</span></a>
						            </li>
						            <li>
						                <a href="<?php echo base_url() . 'admin/dashboard/desainind' ?>"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Desain Industri</span></a>
						            </li>


						            <!--Akses Menu Untuk Admin Akses 3-->
						        <?php elseif ($this->session->userdata('akses') == '3') : ?>
						            <li>
						                <a class="active" href="<?php echo base_url() . 'admin/dashboard' ?>"><i class="si si-screen-desktop"></i><span class="sidebar-mini-hide">Dashboard</span></a>
						            </li>
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/pengguna' ?>"><i class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
                                </li>
                                 -->
						            <li>
						                <a href="<?php echo base_url() . 'admin/dashboard/merek' ?>"><i class="si si-badge"></i><span class="sidebar-mini-hide">Merek</span></a>
						            </li>
						            <!-- <li>
                                    <a href="<?php echo base_url() . 'admin/dashboard/pengguna' ?>"><i class="si si-globe"></i><span class="sidebar-mini-hide">Indikasi Geografis</span></a>
                                </li> -->
						            <li>
						                <a href="<?php echo base_url() . 'admin/dashboard/hakcipta' ?>"><i class="si si-umbrella"></i><span class="sidebar-mini-hide">Hak Cipta</span></a>
						            </li>
						            <li>
						                <a href="<?php echo base_url() . 'admin/dashboard/desainind' ?>"><i class="si si-wrench"></i><span class="sidebar-mini-hide">Desain Industri</span></a>
						            </li>

						            <!--Akses Menu Untuk Users-->
						        <?php else : ?>
						            <li>
						                <a href="<?php echo base_url() . 'admin/dashboard/pengguna' ?>"><i class="si si-user"></i><span class="sidebar-mini-hide">Users</span></a>
						            </li>
						        <?php endif; ?>
						    </ul>
						</div>
						<!-- END Side Navigation -->