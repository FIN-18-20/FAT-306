-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Tue Nov 26 10:05:59 2019 
-- ********************************************* 


-- Database Section
-- ________________ 

create database Printer;
use Printer;


-- Tables Section
-- _____________ 

create table concern (
     idOrder int not null,
     idPrinter int not null,
     constraint ID_concern_ID primary key (idOrder, idPrinter));

create table supply (
     idPrinter int not null,
     idSupplier int not null,
     constraint ID_supply_ID primary key (idPrinter, idSupplier));

create table t_brand (
     idBrand int not null auto_increment,
     braName varchar(50) not null,
     idManufacturer int not null,
     constraint ID_t_brand_ID primary key (idBrand));

create table t_consumable (
     idConsumable int not null auto_increment,
     conModel varchar(50) not null,
     conPrice float(5) not null,
     constraint ID_t_consumable_ID primary key (idConsumable));

create table t_customer (
     idCustomer int not null auto_increment,
     cusName varchar(50) not null,
     cusFirstname varchar(50) not null,
     constraint ID_t_customer_ID primary key (idCustomer));

create table t_history (
     idHistory int not null auto_increment,
     hisPrice float(6) not null,
     hisYear date not null,
     idPrinter int not null,
     constraint ID_t_history_ID primary key (idHistory));

create table t_manufacturer (
     idManufacturer int not null auto_increment,
     manName varchar(50) not null,
     constraint ID_t_manufacturer_ID primary key (idManufacturer));

create table t_order (
     idOrder int not null auto_increment,
     ordDate date not null,
     ordWaranty int not null,
     idCustomer int not null,
     constraint ID_t_order_ID primary key (idOrder));

create table t_printer (
     idPrinter int not null auto_increment,
     priModel varchar(50) not null,
     priPrice float(6) not null,
     priSpeedColor float(3) not null,
     priSpeedBW float(3) not null,
     priResolutionX int not null,
     priResolutionY int not null,
     priDoubleSided char not null,
     priHeight int not null,
     priDepth int not null,
     priWidth int not null,
     priWeight int not null,
     priDate date not null,
     idBrand int not null,
     constraint ID_t_printer_ID primary key (idPrinter));

create table t_supplier (
     idSupplier int not null auto_increment,
     supName varchar(50) not null,
     constraint ID_t_supplier_ID primary key (idSupplier));

create table uses (
     idConsumable int not null,
     idPrinter int not null,
     constraint ID_use_ID primary key (idPrinter, idConsumable));


-- Constraints Section
-- ___________________ 

alter table concern add constraint FKcon_t_p_FK
     foreign key (idPrinter)
     references t_printer (idPrinter);

alter table concern add constraint FKcon_t_o
     foreign key (idOrder)
     references t_order (idOrder);

alter table supply add constraint FKsup_t_s_FK
     foreign key (idSupplier)
     references t_supplier (idSupplier);

alter table supply add constraint FKsup_t_p
     foreign key (idPrinter)
     references t_printer (idPrinter);

-- Not implemented
-- alter table t_brand add constraint ID_t_brand_CHK
--     check(exists(select * from t_printer
--                  where t_printer.idBrand = idBrand)); 

alter table t_brand add constraint FKown_FK
     foreign key (idManufacturer)
     references t_manufacturer (idManufacturer);

-- Not implemented
-- alter table t_consumable add constraint ID_t_consumable_CHK
--     check(exists(select * from use
--                  where use.idConsumable = idConsumable)); 

alter table t_history add constraint FKcost_FK
     foreign key (idPrinter)
     references t_printer (idPrinter);

-- Not implemented
-- alter table t_manufacturer add constraint ID_t_manufacturer_CHK
--     check(exists(select * from t_brand
--                  where t_brand.idManufacturer = idManufacturer)); 

-- Not implemented
-- alter table t_order add constraint ID_t_order_CHK
--     check(exists(select * from concern
--                  where concern.idOrder = idOrder)); 

alter table t_order add constraint FKassign_FK
     foreign key (idCustomer)
     references t_customer (idCustomer);

-- Not implemented
-- alter table t_printer add constraint ID_t_printer_CHK
--     check(exists(select * from t_history
--                  where t_history.idPrinter = idPrinter)); 

-- Not implemented
-- alter table t_printer add constraint ID_t_printer_CHK
--     check(exists(select * from supply
--                  where supply.idPrinter = idPrinter)); 

-- Not implemented
-- alter table t_printer add constraint ID_t_printer_CHK
--     check(exists(select * from use
--                  where use.idPrinter = idPrinter)); 

alter table t_printer add constraint FKcontain_FK
     foreign key (idBrand)
     references t_brand (idBrand);

-- Not implemented
-- alter table t_supplier add constraint ID_t_supplier_CHK
--     check(exists(select * from supply
--                  where supply.idSupplier = idSupplier)); 

alter table uses add constraint FKuse_t_p
     foreign key (idPrinter)
     references t_printer (idPrinter);

alter table uses add constraint FKuse_t_c_FK
     foreign key (idConsumable)
     references t_consumable (idConsumable);


-- Index Section
-- _____________ 

create unique index ID_concern_IND
     on concern (idOrder, idPrinter);

create index FKcon_t_p_IND
     on concern (idPrinter);

create unique index ID_supply_IND
     on supply (idPrinter, idSupplier);

create index FKsup_t_s_IND
     on supply (idSupplier);

create unique index ID_t_brand_IND
     on t_brand (idBrand);

create index FKown_IND
     on t_brand (idManufacturer);

create unique index ID_t_consumable_IND
     on t_consumable (idConsumable);

create unique index ID_t_customer_IND
     on t_customer (idCustomer);

create unique index ID_t_history_IND
     on t_history (idHistory);

create index FKcost_IND
     on t_history (idPrinter);

create unique index ID_t_manufacturer_IND
     on t_manufacturer (idManufacturer);

create unique index ID_t_order_IND
     on t_order (idOrder);

create index FKassign_IND
     on t_order (idCustomer);

create unique index ID_t_printer_IND
     on t_printer (idPrinter);

create index FKcontain_IND
     on t_printer (idBrand);

create unique index ID_t_supplier_IND
     on t_supplier (idSupplier);

create unique index ID_use_IND
     on uses (idPrinter, idConsumable);

create index FKuse_t_c_IND
     on uses (idConsumable);

