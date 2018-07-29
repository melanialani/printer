/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     7/29/2018 7:47:41 PM                         */
/*==============================================================*/


drop table if exists BARANG;

drop table if exists DETAILBARANGPROSES;

drop table if exists DETAIL_PLATE;

drop table if exists HISTORY;

drop table if exists HPEMBELIAN;

drop table if exists HPEMBELIAN_BARANG;

drop table if exists JENIS_CETAKAN;

drop table if exists JENIS_KERTAS;

drop table if exists LAMINASI;

drop table if exists MASTER_PLATE;

drop table if exists PROSES;

drop table if exists UKURAN_KERTAS;

drop table if exists USER;

/*==============================================================*/
/* Table: BARANG                                                */
/*==============================================================*/
create table BARANG
(
   ID_BARANG            int not null,
   NAMA_BARANG          varchar(255),
   JUMLAH               int,
   HARGA_BELI           int,
   HARGA_JUAL           int,
   STOCK_AWAL           int,
   STOCK                int,
   WARNA                varchar(100),
   primary key (ID_BARANG)
);

/*==============================================================*/
/* Table: DETAILBARANGPROSES                                    */
/*==============================================================*/
create table DETAILBARANGPROSES
(
   ID_BARANG            int not null,
   ID_PROSES            varchar(10) not null,
   QTY_BARANG           int,
   JUMLAH_HARGA         int,
   primary key (ID_BARANG, ID_PROSES)
);

/*==============================================================*/
/* Table: DETAIL_PLATE                                          */
/*==============================================================*/
create table DETAIL_PLATE
(
   ID_PROSES            varchar(10) not null,
   ID_MASTER_PLATE      int not null,
   QTY_PLATE            int,
   JUMLAH_HARGA_PLATE   int,
   primary key (ID_PROSES, ID_MASTER_PLATE)
);

/*==============================================================*/
/* Table: HISTORY                                               */
/*==============================================================*/
create table HISTORY
(
   ID_HISTORY           int not null,
   ID_BARANG            int not null,
   TANGGAL              date,
   DESKRIPSI            int,
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
/* Table: HPEMBELIAN_BARANG                                     */
/*==============================================================*/
create table HPEMBELIAN_BARANG
(
   ID_TRANS             varchar(255) not null,
   ID_BARANG            int not null,
   QTY_BARANG           int,
   JUMLAH               int,
   primary key (ID_TRANS, ID_BARANG)
);

/*==============================================================*/
/* Table: JENIS_CETAKAN                                         */
/*==============================================================*/
create table JENIS_CETAKAN
(
   ID_JENIS_CETAKAN     int not null,
   NAMA_JENIS_CETAKAN   varchar(255),
   primary key (ID_JENIS_CETAKAN)
);

/*==============================================================*/
/* Table: JENIS_KERTAS                                          */
/*==============================================================*/
create table JENIS_KERTAS
(
   ID_JENIS_KERTAS      varchar(255) not null,
   ID_BARANG            int,
   NAMAJENIS_KERTAS     varchar(255),
   primary key (ID_JENIS_KERTAS)
);

/*==============================================================*/
/* Table: LAMINASI                                              */
/*==============================================================*/
create table LAMINASI
(
   ID_LAMINASI          int not null,
   ID_PROSES            varchar(10),
   NAMA_LAMINASI        varchar(255),
   primary key (ID_LAMINASI)
);

/*==============================================================*/
/* Table: MASTER_PLATE                                          */
/*==============================================================*/
create table MASTER_PLATE
(
   ID_MASTER_PLATE      int not null,
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
   ID_UKURAN_KERTAS     int not null,
   ID_BARANG            int,
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
   ID_USER              int not null,
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

alter table DETAILBARANGPROSES add constraint FK_BARANG_PROSES foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

alter table DETAILBARANGPROSES add constraint FK_BARANG_PROSES2 foreign key (ID_PROSES)
      references PROSES (ID_PROSES) on delete restrict on update restrict;

alter table DETAIL_PLATE add constraint FK_PROSES_MASTER_PLATE foreign key (ID_PROSES)
      references PROSES (ID_PROSES) on delete restrict on update restrict;

alter table DETAIL_PLATE add constraint FK_PROSES_MASTER_PLATE2 foreign key (ID_MASTER_PLATE)
      references MASTER_PLATE (ID_MASTER_PLATE) on delete restrict on update restrict;

alter table HISTORY add constraint FK_BARANG_HISTORY foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

alter table HPEMBELIAN add constraint FK_USER_HPEMBELIAN foreign key (ID_USER)
      references USER (ID_USER) on delete restrict on update restrict;

alter table HPEMBELIAN_BARANG add constraint FK_HPEMBELIAN_BARANG foreign key (ID_TRANS)
      references HPEMBELIAN (ID_TRANS) on delete restrict on update restrict;

alter table HPEMBELIAN_BARANG add constraint FK_HPEMBELIAN_BARANG2 foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

alter table JENIS_KERTAS add constraint FK_BARANG_JENIS_KERTAS foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

alter table LAMINASI add constraint FK_PROSES_LAMINASI foreign key (ID_PROSES)
      references PROSES (ID_PROSES) on delete restrict on update restrict;

alter table PROSES add constraint FK_PROSES_JENIS_CETAKAN foreign key (ID_JENIS_CETAKAN)
      references JENIS_CETAKAN (ID_JENIS_CETAKAN) on delete restrict on update restrict;

alter table UKURAN_KERTAS add constraint FK_BARANG_UKURAN_KERTAS foreign key (ID_BARANG)
      references BARANG (ID_BARANG) on delete restrict on update restrict;

