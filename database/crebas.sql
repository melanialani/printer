/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     8/17/2018 7:33:53 PM                         */
/*==============================================================*/


drop table if exists BARANG_HPEMBELIAN;

drop table if exists DETAILBARANGPROSES;

drop table if exists DETAIL_PLATE;

drop table if exists HISTORY;

drop table if exists HPEMBELIAN;

drop table if exists DPEMBELIAN_BARANG;

drop table if exists DPEMBELIAN_CETAK;

drop table if exists JENIS_BARANG;

drop table if exists JENIS_CETAKAN;

drop table if exists JENIS_KERTAS;

drop table if exists LAMINASI;

drop table if exists MASTER_PLATE;

drop table if exists PROSES;

drop table if exists UKURAN_KERTAS;

drop table if exists USER;

drop table if exists VARIAN;

/*==============================================================*/
/* Table: BARANG_HPEMBELIAN                                     */
/*==============================================================*/
create table BARANG_HPEMBELIAN
(
   ID_VARIAN            int not null,
   ID_TRANS             varchar(255) not null,
   primary key (ID_VARIAN, ID_TRANS)
);

/*==============================================================*/
/* Table: DETAILBARANGPROSES                                    */
/*==============================================================*/
create table DETAILBARANGPROSES
(
   ID_VARIAN            int not null,
   ID_PROSES            varchar(10) not null,
   QTY_BARANG           int,
   JUMLAH_HARGA         int,
   primary key (ID_VARIAN, ID_PROSES)
);

/*==============================================================*/
/* Table: DETAIL_PLATE                                          */
/*==============================================================*/
create table DETAIL_PLATE
(
   ID_MASTER_PLATE      int not null,
   ID_PROSES            varchar(10) not null,
   QTY_PLATE            int,
   JUMLAH_HARGA_PLATE   int,
   primary key (ID_MASTER_PLATE, ID_PROSES)
);

/*==============================================================*/
/* Table: HISTORY                                               */
/*==============================================================*/
create table HISTORY
(
   ID_HISTORY           int not null AUTO_INCREMENT,
   ID_VARIAN            int not null,
   TANGGAL              datetime,
   DESKRIPSI            varchar(255) not null,
   primary key (ID_HISTORY)
);

/*==============================================================*/
/* Table: HPEMBELIAN                                            */
/*==============================================================*/
create table HPEMBELIAN
(
   ID_TRANS             varchar(255) not null,
   ID_USER              int not null,
   TANGGAL_TRANS        date,
   TOTAL_HARGA          int,
   CUSTOMER             varchar(255),
   primary key (ID_TRANS)
);

/*==============================================================*/
/* Table: DPEMBELIAN_BARANG                                     */
/*==============================================================*/
create table DPEMBELIAN_BARANG
(
   ID_VARIAN            int not null,
   ID_TRANS             varchar(255) not null,
   QTY_BARANG           int,
   JUMLAH               int,
   primary key (ID_VARIAN, ID_TRANS)
);

/*==============================================================*/
/* Table: DPEMBELIAN_CETAK                                      */
/*==============================================================*/
create table DPEMBELIAN_CETAK
(
   ID_TRANS             varchar(255) not null,
   ID_VARIAN            int not null,
   QTY_BARANG           int,
   JUMLAH               int,
   primary key (ID_TRANS, ID_VARIAN)
);

/*==============================================================*/
/* Table: JENIS_BARANG                                          */
/*==============================================================*/
create table JENIS_BARANG
(
   ID_JENIS_BARANG      int not null AUTO_INCREMENT,
   NAMA_JENIS_BARANG    varchar(255),
   primary key (ID_JENIS_BARANG)
);

/*==============================================================*/
/* Table: JENIS_CETAKAN                                         */
/*==============================================================*/
create table JENIS_CETAKAN
(
   ID_JENIS_CETAKAN     int not null AUTO_INCREMENT,
   NAMA_JENIS_CETAKAN   varchar(255),
   primary key (ID_JENIS_CETAKAN)
);

/*==============================================================*/
/* Table: JENIS_KERTAS                                          */
/*==============================================================*/
create table JENIS_KERTAS
(
   ID_JENIS_KERTAS      int not null AUTO_INCREMENT,
   NAMAJENIS_KERTAS     varchar(255),
   primary key (ID_JENIS_KERTAS)
);

/*==============================================================*/
/* Table: LAMINASI                                              */
/*==============================================================*/
create table LAMINASI
(
   ID_LAMINASI          int not null AUTO_INCREMENT,
   ID_PROSES            varchar(10),
   NAMA_LAMINASI        varchar(255),
   primary key (ID_LAMINASI)
);

/*==============================================================*/
/* Table: MASTER_PLATE                                          */
/*==============================================================*/
create table MASTER_PLATE
(
   ID_MASTER_PLATE      int not null AUTO_INCREMENT,
   PANJANG_PLATE        int,
   LEBAR_PLATE          int,
   primary key (ID_MASTER_PLATE)
);

/*==============================================================*/
/* Table: PROSES                                                */
/*==============================================================*/
create table PROSES
(
   ID_PROSES            varchar(10) not null,
   ID_JENIS_CETAKAN     int not null,
   NUMERATOR            smallint,
   PLONG                smallint,
   PANJANG_CETAK        int,
   LEBAR_CETAK          int,
   TINGGI_CETAK         int,
   primary key (ID_PROSES)
);

/*==============================================================*/
/* Table: UKURAN_KERTAS                                         */
/*==============================================================*/
create table UKURAN_KERTAS
(
   ID_UKURAN_KERTAS     int not null AUTO_INCREMENT,
   NAMA_UKURAN_KERTAS   varchar(255),
   PANJANG_KERTAS       int,
   LEBAR_KERTAS         int,
   primary key (ID_UKURAN_KERTAS)
);

/*==============================================================*/
/* Table: USER                                                  */
/*==============================================================*/
create table USER
(
   ID_USER              int not null AUTO_INCREMENT,
   NAMA_USER            varchar(255),
   ALAMAT_USER          varchar(255),
   NO_HP                varchar(14),
   EMAIL                varchar(255),
   PHOTO                varchar(255),
   USERNAME             varchar(255),
   PASSWORD             varchar(255),
   ROLE                 int,
   IS_ACTIVE            smallint,
   primary key (ID_USER)
);

/*==============================================================*/
/* Table: VARIAN                                                */
/*==============================================================*/
create table VARIAN
(
   ID_VARIAN            int not null,
   ID_JENIS_BARANG      int not null,
   ID_UKURAN_KERTAS     int,
   ID_JENIS_KERTAS      int,
   NAMA_VARIAN          varchar(255),
   JUMLAH               int,
   STOCK_AWAL           int,
   STOCK                int,
   WARNA                varchar(100),
   HARGA_BELI           int,
   HARGA_JUAL           int,
   primary key (ID_VARIAN)
);

alter table BARANG_HPEMBELIAN add constraint FK_BARANG_HPEMBELIAN foreign key (ID_VARIAN)
      references VARIAN (ID_VARIAN) on delete restrict on update restrict;

alter table BARANG_HPEMBELIAN add constraint FK_BARANG_HPEMBELIAN2 foreign key (ID_TRANS)
      references HPEMBELIAN (ID_TRANS) on delete restrict on update restrict;

alter table DETAILBARANGPROSES add constraint FK_BARANG_PROSES foreign key (ID_VARIAN)
      references VARIAN (ID_VARIAN) on delete restrict on update restrict;

alter table DETAILBARANGPROSES add constraint FK_BARANG_PROSES2 foreign key (ID_PROSES)
      references PROSES (ID_PROSES) on delete restrict on update restrict;

alter table DETAIL_PLATE add constraint FK_PROSES_MASTER_PLATE foreign key (ID_MASTER_PLATE)
      references MASTER_PLATE (ID_MASTER_PLATE) on delete restrict on update restrict;

alter table DETAIL_PLATE add constraint FK_PROSES_MASTER_PLATE2 foreign key (ID_PROSES)
      references PROSES (ID_PROSES) on delete restrict on update restrict;

alter table HISTORY add constraint FK_VARIAN_HISTORY foreign key (ID_VARIAN)
      references VARIAN (ID_VARIAN) on delete restrict on update restrict;

alter table HPEMBELIAN add constraint FK_USER_HPEMBELIAN foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table DPEMBELIAN_BARANG add constraint FK_DPEMBELIAN_BARANG foreign key (ID_VARIAN)
      references VARIAN (ID_VARIAN) on delete restrict on update restrict;

alter table DPEMBELIAN_BARANG add constraint FK_DPEMBELIAN_BARANG2 foreign key (ID_TRANS)
      references HPEMBELIAN (ID_TRANS) on delete restrict on update restrict;

alter table DPEMBELIAN_CETAK add constraint FK_DPEMBELIAN_CETAK foreign key (ID_TRANS)
      references HPEMBELIAN (ID_TRANS) on delete restrict on update restrict;

alter table DPEMBELIAN_CETAK add constraint FK_DPEMBELIAN_CETAK2 foreign key (ID_VARIAN)
      references VARIAN (ID_VARIAN) on delete restrict on update restrict;

alter table LAMINASI add constraint FK_PROSES_LAMINASI foreign key (ID_PROSES)
      references PROSES (ID_PROSES) on delete restrict on update restrict;

alter table PROSES add constraint FK_PROSES_JENIS_CETAKAN foreign key (ID_JENIS_CETAKAN)
      references JENIS_CETAKAN (ID_JENIS_CETAKAN) on delete restrict on update restrict;

alter table VARIAN add constraint FK_BARANG_JENIS_KERTAS foreign key (ID_JENIS_KERTAS)
      references JENIS_KERTAS (ID_JENIS_KERTAS) on delete restrict on update restrict;

alter table VARIAN add constraint FK_JENISBARANG_VARIAN foreign key (ID_JENIS_BARANG)
      references JENIS_BARANG (ID_JENIS_BARANG) on delete restrict on update restrict;

alter table VARIAN add constraint FK_VARIAN_UKURAN_KERTAS foreign key (ID_UKURAN_KERTAS)
      references UKURAN_KERTAS (ID_UKURAN_KERTAS) on delete restrict on update restrict;

