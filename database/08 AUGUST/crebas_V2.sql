/*==============================================================*/
/* dbms name:      mysql 5.0                                    */
/* created on:     8/17/2018 7:33:53 pm                         */
/*==============================================================*/


drop table if exists barang_hpembelian;

drop table if exists detailbarangproses;

drop table if exists detail_plate;

drop table if exists history;

drop table if exists hpembelian;

drop table if exists dpembelian_barang;

drop table if exists dpembelian_cetak;

drop table if exists jenis_barang;

drop table if exists jenis_cetakan;

drop table if exists jenis_kertas;

drop table if exists laminasi;

drop table if exists master_plate;

drop table if exists proses;

drop table if exists ukuran_kertas;

drop table if exists user;

drop table if exists varian;

/*==============================================================*/
/* table: barang_hpembelian                                     */
/*==============================================================*/
create table barang_hpembelian
(
   id_varian            int not null,
   id_trans             varchar(255) not null,
   primary key (id_varian, id_trans)
);

/*==============================================================*/
/* table: detailbarangproses                                    */
/*==============================================================*/
create table detailbarangproses
(
   id_varian            int not null,
   id_proses            varchar(10) not null,
   qty_barang           int,
   jumlah_harga         int,
   primary key (id_varian, id_proses)
);

/*==============================================================*/
/* table: detail_plate                                          */
/*==============================================================*/
create table detail_plate
(
   id_master_plate      int not null,
   id_proses            varchar(10) not null,
   qty_plate            int,
   jumlah_harga_plate   int,
   primary key (id_master_plate, id_proses)
);

/*==============================================================*/
/* table: history                                               */
/*==============================================================*/
create table history
(
   id_history           int not null auto_increment,
   id_varian            int not null,
   tanggal              datetime,
   deskripsi            varchar(255) not null,
   primary key (id_history)
);

/*==============================================================*/
/* table: hpembelian                                            */
/*==============================================================*/
create table hpembelian
(
   id_trans             varchar(255) not null,
   id_user              int not null,
   tanggal_trans        date,
   total_harga          int,
   customer             varchar(255),
   primary key (id_trans)
);

/*==============================================================*/
/* table: dpembelian_barang                                     */
/*==============================================================*/
create table dpembelian_barang
(
   id_varian            int not null,
   id_trans             varchar(255) not null,
   qty_barang           int,
   jumlah               int,
   primary key (id_varian, id_trans)
);

/*==============================================================*/
/* table: dpembelian_cetak                                      */
/*==============================================================*/
create table dpembelian_cetak
(
   id_trans             varchar(255) not null,
   id_varian            int not null,
   qty_barang           int,
   jumlah               int,
   primary key (id_trans, id_varian)
);

/*==============================================================*/
/* table: jenis_barang                                          */
/*==============================================================*/
create table jenis_barang
(
   id_jenis_barang      int not null auto_increment,
   nama_jenis_barang    varchar(255),
   primary key (id_jenis_barang)
);

/*==============================================================*/
/* table: jenis_cetakan                                         */
/*==============================================================*/
create table jenis_cetakan
(
   id_jenis_cetakan     int not null auto_increment,
   nama_jenis_cetakan   varchar(255),
   primary key (id_jenis_cetakan)
);

/*==============================================================*/
/* table: jenis_kertas                                          */
/*==============================================================*/
create table jenis_kertas
(
   id_jenis_kertas      int not null auto_increment,
   namajenis_kertas     varchar(255),
   primary key (id_jenis_kertas)
);

/*==============================================================*/
/* table: laminasi                                              */
/*==============================================================*/
create table laminasi
(
   id_laminasi          int not null auto_increment,
   id_proses            varchar(10),
   nama_laminasi        varchar(255),
   primary key (id_laminasi)
);

/*==============================================================*/
/* table: master_plate                                          */
/*==============================================================*/
create table master_plate
(
   id_master_plate      int not null auto_increment,
   panjang_plate        int,
   lebar_plate          int,
   primary key (id_master_plate)
);

/*==============================================================*/
/* table: proses                                                */
/*==============================================================*/
create table proses
(
   id_proses            varchar(10) not null,
   id_jenis_cetakan     int not null,
   numerator            smallint,
   plong                smallint,
   panjang_cetak        int,
   lebar_cetak          int,
   tinggi_cetak         int,
   primary key (id_proses)
);

/*==============================================================*/
/* table: ukuran_kertas                                         */
/*==============================================================*/
create table ukuran_kertas
(
   id_ukuran_kertas     int not null auto_increment,
   nama_ukuran_kertas   varchar(255),
   panjang_kertas       int,
   lebar_kertas         int,
   primary key (id_ukuran_kertas)
);

/*==============================================================*/
/* table: user                                                  */
/*==============================================================*/
create table user
(
   id_user              int not null auto_increment,
   nama_user            varchar(255),
   alamat_user          varchar(255),
   no_hp                varchar(14),
   email                varchar(255),
   photo                varchar(255),
   username             varchar(255),
   password             varchar(255),
   role                 int,
   is_active            smallint,
   primary key (id_user)
);

/*==============================================================*/
/* table: varian                                                */
/*==============================================================*/
create table varian
(
   id_varian            int not null auto_increment,
   id_jenis_barang      int not null,
   id_ukuran_kertas     int,
   id_jenis_kertas      int,
   nama_varian          varchar(255),
   jumlah               int,
   stock_awal           int,
   stock                int,
   warna                varchar(100),
   harga_beli           int,
   harga_jual           int,
   warning              int not null default '100',
   primary key (id_varian)
);

alter table barang_hpembelian add constraint fk_barang_hpembelian foreign key (id_varian)
      references varian (id_varian) on delete restrict on update restrict;

alter table barang_hpembelian add constraint fk_barang_hpembelian2 foreign key (id_trans)
      references hpembelian (id_trans) on delete restrict on update restrict;

alter table detailbarangproses add constraint fk_barang_proses foreign key (id_varian)
      references varian (id_varian) on delete restrict on update restrict;

alter table detailbarangproses add constraint fk_barang_proses2 foreign key (id_proses)
      references proses (id_proses) on delete restrict on update restrict;

alter table detail_plate add constraint fk_proses_master_plate foreign key (id_master_plate)
      references master_plate (id_master_plate) on delete restrict on update restrict;

alter table detail_plate add constraint fk_proses_master_plate2 foreign key (id_proses)
      references proses (id_proses) on delete restrict on update restrict;

alter table history add constraint fk_varian_history foreign key (id_varian)
      references varian (id_varian) on delete restrict on update restrict;

alter table hpembelian add constraint fk_user_hpembelian foreign key (id_user)
      references user (id_user) on delete restrict on update restrict;

alter table dpembelian_barang add constraint fk_dpembelian_barang foreign key (id_varian)
      references varian (id_varian) on delete restrict on update restrict;

alter table dpembelian_barang add constraint fk_dpembelian_barang2 foreign key (id_trans)
      references hpembelian (id_trans) on delete restrict on update restrict;

alter table dpembelian_cetak add constraint fk_dpembelian_cetak foreign key (id_trans)
      references hpembelian (id_trans) on delete restrict on update restrict;

alter table dpembelian_cetak add constraint fk_dpembelian_cetak2 foreign key (id_varian)
      references varian (id_varian) on delete restrict on update restrict;

alter table laminasi add constraint fk_proses_laminasi foreign key (id_proses)
      references proses (id_proses) on delete restrict on update restrict;

alter table proses add constraint fk_proses_jenis_cetakan foreign key (id_jenis_cetakan)
      references jenis_cetakan (id_jenis_cetakan) on delete restrict on update restrict;

alter table varian add constraint fk_barang_jenis_kertas foreign key (id_jenis_kertas)
      references jenis_kertas (id_jenis_kertas) on delete restrict on update restrict;

alter table varian add constraint fk_jenisbarang_varian foreign key (id_jenis_barang)
      references jenis_barang (id_jenis_barang) on delete restrict on update restrict;

alter table varian add constraint fk_varian_ukuran_kertas foreign key (id_ukuran_kertas)
      references ukuran_kertas (id_ukuran_kertas) on delete restrict on update restrict;

--
-- Dumping data for tables
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat_user`, `no_hp`, `email`, `photo`, `username`, `password`, `role`, `is_active`) VALUES
(1, 'Administrator', 'Alamat Lengkap Admin', '081234567890', 'admin@mail.com', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, 1),
(2, 'Mary Jane', '', '', 'maryjane@gmail.com', NULL, 'mary', '5844a15e76563fedd11840fd6f40ea7b', 1, 1);

INSERT INTO `jenis_barang` (`id_jenis_barang`, `nama_jenis_barang`) VALUES
(1, 'Kertas'),
(2, 'Tinta');

INSERT INTO `jenis_cetakan` (`id_jenis_cetakan`, `nama_jenis_cetakan`) VALUES
(1, 'Undangan'),
(2, 'Brosur');

INSERT INTO `jenis_kertas` (`id_jenis_kertas`, `namajenis_kertas`) VALUES
(0, 'Tanpa jenis kertas'),
(1, 'Glossy'),
(2, 'Dove');

INSERT INTO `master_plate` (`id_master_plate`, `panjang_plate`, `lebar_plate`) VALUES
(1, 30, 20),
(2, 50, 50);

INSERT INTO `ukuran_kertas` (`id_ukuran_kertas`, `nama_ukuran_kertas`, `panjang_kertas`, `lebar_kertas`) VALUES
(0, 'Tanpa ukuran kertas', 0, 0),
(1, 'Ukuran A4', 110, 75),
(2, 'Ukuran A5', 75, 50);
