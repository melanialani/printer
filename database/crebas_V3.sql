/*==============================================================*/
/* dbms name:      mysql 5.0                                    */
/* created on:     7/29/2018 7:47:41 pm                         */
/*==============================================================*/


drop table if exists barang;

drop table if exists detailbarangproses;

drop table if exists detail_plate;

drop table if exists history;

drop table if exists hpembelian;

drop table if exists hpembelian_barang;

drop table if exists jenis_cetakan;

drop table if exists jenis_kertas;

drop table if exists laminasi;

drop table if exists master_plate;

drop table if exists proses;

drop table if exists ukuran_kertas;

drop table if exists user;

/*==============================================================*/
/* table: barang                                                */
/*==============================================================*/
create table barang
(
   id_barang            int not null auto_increment,
   nama_barang          varchar(255),
   jumlah               int,
   harga_beli           int,
   harga_jual           int,
   stock_awal           int,
   stock                int,
   warning              int,
   warna                varchar(100),
   primary key (id_barang)
);

/*==============================================================*/
/* table: detailbarangproses                                    */
/*==============================================================*/
create table detailbarangproses
(
   id_barang            int not null,
   id_proses            int not null,
   qty_barang           int,
   jumlah_harga         int,
   primary key (id_barang, id_proses)
);

/*==============================================================*/
/* table: detail_plate                                          */
/*==============================================================*/
create table detail_plate
(
   id_proses            int not null,
   id_master_plate      int not null,
   qty_plate            int,
   jumlah_harga_plate   int,
   primary key (id_proses, id_master_plate)
);

/*==============================================================*/
/* table: history                                               */
/*==============================================================*/
create table history
(
   id_history           int not null auto_increment,
   id_barang            int not null,
   tanggal              date,
   deskripsi            int,
   primary key (id_history)
);

/*==============================================================*/
/* table: hpembelian                                            */
/*==============================================================*/
create table hpembelian
(
   id_trans             int not null auto_increment,
   id_user              int not null,
   tanggal_trans        datetime,
   total_harga          int,
   customer             varchar(255),
   primary key (id_trans)
);

/*==============================================================*/
/* table: hpembelian_barang                                     */
/*==============================================================*/
create table hpembelian_barang
(
   id_trans             int not null,
   id_barang            int not null,
   qty_barang           int,
   jumlah               int,
   subtotal             int,
   primary key (id_trans, id_barang)
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
   id_barang            int,
   namajenis_kertas     varchar(255),
   primary key (id_jenis_kertas)
);

/*==============================================================*/
/* table: laminasi                                              */
/*==============================================================*/
create table laminasi
(
   id_laminasi          int not null auto_increment,
   id_proses            int,
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
   id_proses            int not null auto_increment,
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
   id_barang            int,
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
   role                 tinyint(1),
   is_active            tinyint(1),
   primary key (id_user)
);

alter table detailbarangproses add constraint fk_barang_proses foreign key (id_barang)
      references barang (id_barang) on delete restrict on update restrict;

alter table detailbarangproses add constraint fk_barang_proses2 foreign key (id_proses)
      references proses (id_proses) on delete restrict on update restrict;

alter table detail_plate add constraint fk_proses_master_plate foreign key (id_proses)
      references proses (id_proses) on delete restrict on update restrict;

alter table detail_plate add constraint fk_proses_master_plate2 foreign key (id_master_plate)
      references master_plate (id_master_plate) on delete restrict on update restrict;

alter table history add constraint fk_barang_history foreign key (id_barang)
      references barang (id_barang) on delete restrict on update restrict;

alter table hpembelian add constraint fk_user_hpembelian foreign key (id_user)
      references user (id_user) on delete restrict on update restrict;

alter table hpembelian_barang add constraint fk_hpembelian_barang foreign key (id_trans)
      references hpembelian (id_trans) on delete restrict on update restrict;

alter table hpembelian_barang add constraint fk_hpembelian_barang2 foreign key (id_barang)
      references barang (id_barang) on delete restrict on update restrict;

alter table jenis_kertas add constraint fk_barang_jenis_kertas foreign key (id_barang)
      references barang (id_barang) on delete restrict on update restrict;

alter table laminasi add constraint fk_proses_laminasi foreign key (id_proses)
      references proses (id_proses) on delete restrict on update restrict;

alter table proses add constraint fk_proses_jenis_cetakan foreign key (id_jenis_cetakan)
      references jenis_cetakan (id_jenis_cetakan) on delete restrict on update restrict;

alter table ukuran_kertas add constraint fk_barang_ukuran_kertas foreign key (id_barang)
      references barang (id_barang) on delete restrict on update restrict;
