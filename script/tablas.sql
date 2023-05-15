

-- crea base de datos 
CREATE database Autocares;

-- establece como activa CaminoSantiago
use Autocares;

/* Crea Tabla Cliente  */
create table Cliente
(IdCli int(10) primary key,
NombreCli varchar(30) not null,
ApellidosCli varchar(30) not null, 
CIF varchar(15) not null, 
DireccionCli varchar(30) not null, 
CiudadCli varchar(30) not null, 
CpostalCli varchar(15) not null, 	
ProvinciaCli varchar(30) not null,
TelefonoCli varchar(15) not null, 
EmailCli varchar(30) 
);

/* crea tabla Empleado */
create table Empleado
(IdEmp int(10) primary key,
NombreEmp varchar(30) not null, 
ApellidosEmp varchar(30) not null, 
NIF varchar(15) not null, 
DireccionEmp varchar(30) not null, 
CiudadEmp varchar(30) not null, 	
CpostalEmp varchar(15) not null, 
ProvinciaEmp varchar(30) not null, 
TelefonoEmp varchar(15) not null, 
EmailEmp varchar(30),
FechaAltaEmp date not null, 
NumeroEmp varchar(15) not null, 	
SSocialEmp varchar(15) not null
);

/* crea tabla Jefe trafico */
create table JefeTrafico
(IdJef int(10) not null, 
IdEmpJef int(10) not null,
primary key (IdJef, IdEmpJef),
foreign key (IdEmpJef) references Empleado(IdEmp)
);

/* crea tabla Administrativo */
create table Administrativo
(IdAdm int(10) not null, 
IdEmpAdm int(10) not null,
primary key (IdAdm, IdEmpAdm),
foreign key (IdEmpAdm) references Empleado(IdEmp)
);

/* crea tabla Conductor */
create table Conductor
(IdCon int(10) not null, 
IdEmpCon int(10) not null,
FechaCap date not null,
FechaCarnet date not null,
PermisoEsc char(2),
primary key (IdCon, IdEmpCon),
foreign key (IdEmpCon) references Empleado(IdEmp)
);

/* crea tabla Rutas  */
create table Rutas
(IdRu int(10) primary key,
HoraInicioRu time not null,
HoraFinalRu time not null, 
ParadasRu varchar(50) not null,
NPasajeros int not null,  
NotasRu text
);

/* crea tabla Regulares  */
create table Regulares
(IdRe int(10) not null,
IdRuRe int(10) not null, 
NumeroRuta varchar(15) not null, 
NEscolarEso int not null, 	
NescolarBach int not null, 
primary key (IdRe, IdRuRe),
foreign key (IdRuRe) references Rutas(IdRu)
);

/* crea tabla Discrecionales  */
create table Discrecionales
(IdDis int(10) not null,
IdRuDis int(10) not null, 
FechaDis date not null, 	
primary key (IdDis, IdRuDis),
foreign key (IdRuDis) references Rutas(IdRu)
);

/* crea tabla ClienteRegular */
create table ClienteRuta
(IdCliCR int(10) not null, 
IdRuCR int(10) not null,
IdCR int(10) not null,
primary key (IdCliCR, IdRuCR, IdCR),
foreign key (IdCliCR) references Cliente(IdCli),
foreign key (IdRuCR) references Rutas(IdRu)
);

/* crea tabla ConductorRuta */
create table ConductorRuta
(IdConCRu int(10) not null, 
IdRuCRu int(10) not null,
primary key (IdConCRu, IdRuCRu),
foreign key (IdConCRu) references Conductor(IdCon),
foreign key (IdRuCRu) references Rutas(IdRu)
);



