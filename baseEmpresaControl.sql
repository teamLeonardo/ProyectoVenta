USE [master]
GO
/****** Object:  Database [EmpresaControl]    Script Date: 10/10/2019 3:41:51 AM ******/
CREATE DATABASE [EmpresaControl]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'EmpresaControl', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\EmpresaControl.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'EmpresaControl_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\EmpresaControl_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [EmpresaControl] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [EmpresaControl].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [EmpresaControl] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [EmpresaControl] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [EmpresaControl] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [EmpresaControl] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [EmpresaControl] SET ARITHABORT OFF 
GO
ALTER DATABASE [EmpresaControl] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [EmpresaControl] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [EmpresaControl] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [EmpresaControl] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [EmpresaControl] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [EmpresaControl] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [EmpresaControl] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [EmpresaControl] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [EmpresaControl] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [EmpresaControl] SET  DISABLE_BROKER 
GO
ALTER DATABASE [EmpresaControl] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [EmpresaControl] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [EmpresaControl] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [EmpresaControl] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [EmpresaControl] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [EmpresaControl] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [EmpresaControl] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [EmpresaControl] SET RECOVERY FULL 
GO
ALTER DATABASE [EmpresaControl] SET  MULTI_USER 
GO
ALTER DATABASE [EmpresaControl] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [EmpresaControl] SET DB_CHAINING OFF 
GO
ALTER DATABASE [EmpresaControl] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [EmpresaControl] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [EmpresaControl] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'EmpresaControl', N'ON'
GO
ALTER DATABASE [EmpresaControl] SET QUERY_STORE = OFF
GO
USE [EmpresaControl]
GO
/****** Object:  Table [dbo].[cestados]    Script Date: 10/10/2019 3:41:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cestados](
	[id-estado] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](50) NULL,
 CONSTRAINT [PK_cestados] PRIMARY KEY CLUSTERED 
(
	[id-estado] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Control-almacen]    Script Date: 10/10/2019 3:41:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Control-almacen](
	[id-almacen] [int] IDENTITY(1,1) NOT NULL,
	[descripcion] [varchar](50) NULL,
	[ubic-dis-departamento] [int] NULL,
	[id_empresa] [int] NULL,
	[id_estado] [int] NULL,
 CONSTRAINT [PK_Control-almacen] PRIMARY KEY CLUSTERED 
(
	[id-almacen] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Control-Punto-Venta]    Script Date: 10/10/2019 3:41:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Control-Punto-Venta](
	[id-punto-Venta] [int] IDENTITY(1,1) NOT NULL,
	[nombre-PV] [varchar](50) NULL,
	[ubic-dis-departa] [int] NULL,
	[id_empresa] [int] NULL,
	[id_estado] [int] NULL,
	[id_almacen] [int] NULL,
 CONSTRAINT [PK_Control-Punto-Venta] PRIMARY KEY CLUSTERED 
(
	[id-punto-Venta] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[MASTER-EMPRESA]    Script Date: 10/10/2019 3:41:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[MASTER-EMPRESA](
	[id_empresa] [int] IDENTITY(1,1) NOT NULL,
	[nom_Empresa] [varchar](50) NULL,
	[ruc] [varchar](50) NULL,
	[id_estado] [int] NULL,
	[id_usuario] [int] NULL,
 CONSTRAINT [PK_MASTER-EMPRESA] PRIMARY KEY CLUSTERED 
(
	[id_empresa] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[UBIGEO]    Script Date: 10/10/2019 3:41:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[UBIGEO](
	[id_ubicacion] [int] IDENTITY(1,1) NOT NULL,
	[departamento] [varchar](50) NULL,
	[distrito] [varchar](50) NULL,
 CONSTRAINT [PK_UBIGEO] PRIMARY KEY CLUSTERED 
(
	[id_ubicacion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[UsuarioMaster]    Script Date: 10/10/2019 3:41:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[UsuarioMaster](
	[id_usu_master] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
	[apellido] [varchar](50) NULL,
	[dni] [varchar](50) NULL,
	[usuario] [varchar](50) NULL,
	[pass] [varchar](50) NULL,
	[id_estado] [int] NULL,
 CONSTRAINT [PK_UsuarioMaster] PRIMARY KEY CLUSTERED 
(
	[id_usu_master] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[cestados] ON 
GO
INSERT [dbo].[cestados] ([id-estado], [descripcion]) VALUES (1, N'eliminado')
GO
INSERT [dbo].[cestados] ([id-estado], [descripcion]) VALUES (2, N'implementacion')
GO
INSERT [dbo].[cestados] ([id-estado], [descripcion]) VALUES (3, N'habilitado')
GO
SET IDENTITY_INSERT [dbo].[cestados] OFF
GO
SET IDENTITY_INSERT [dbo].[UBIGEO] ON 
GO
INSERT [dbo].[UBIGEO] ([id_ubicacion], [departamento], [distrito]) VALUES (1, N'lima', N'lima')
GO
INSERT [dbo].[UBIGEO] ([id_ubicacion], [departamento], [distrito]) VALUES (2, N'lima', N'chorrillo')
GO
INSERT [dbo].[UBIGEO] ([id_ubicacion], [departamento], [distrito]) VALUES (3, N'lima', N'sjm')
GO
INSERT [dbo].[UBIGEO] ([id_ubicacion], [departamento], [distrito]) VALUES (4, N'lima', N'villa de salvador')
GO
INSERT [dbo].[UBIGEO] ([id_ubicacion], [departamento], [distrito]) VALUES (5, N'lima', N'sjl')
GO
SET IDENTITY_INSERT [dbo].[UBIGEO] OFF
GO
ALTER TABLE [dbo].[Control-almacen]  WITH CHECK ADD  CONSTRAINT [FK_Control-almacen_cestados] FOREIGN KEY([id_estado])
REFERENCES [dbo].[cestados] ([id-estado])
GO
ALTER TABLE [dbo].[Control-almacen] CHECK CONSTRAINT [FK_Control-almacen_cestados]
GO
ALTER TABLE [dbo].[Control-almacen]  WITH CHECK ADD  CONSTRAINT [FK_Control-almacen_MASTER-EMPRESA] FOREIGN KEY([id_empresa])
REFERENCES [dbo].[MASTER-EMPRESA] ([id_empresa])
GO
ALTER TABLE [dbo].[Control-almacen] CHECK CONSTRAINT [FK_Control-almacen_MASTER-EMPRESA]
GO
ALTER TABLE [dbo].[Control-almacen]  WITH CHECK ADD  CONSTRAINT [FK_Control-almacen_UBIGEO] FOREIGN KEY([ubic-dis-departamento])
REFERENCES [dbo].[UBIGEO] ([id_ubicacion])
GO
ALTER TABLE [dbo].[Control-almacen] CHECK CONSTRAINT [FK_Control-almacen_UBIGEO]
GO
ALTER TABLE [dbo].[Control-Punto-Venta]  WITH CHECK ADD  CONSTRAINT [FK_Control-Punto-Venta_cestados] FOREIGN KEY([id_estado])
REFERENCES [dbo].[cestados] ([id-estado])
GO
ALTER TABLE [dbo].[Control-Punto-Venta] CHECK CONSTRAINT [FK_Control-Punto-Venta_cestados]
GO
ALTER TABLE [dbo].[Control-Punto-Venta]  WITH CHECK ADD  CONSTRAINT [FK_Control-Punto-Venta_MASTER-EMPRESA] FOREIGN KEY([id_empresa])
REFERENCES [dbo].[MASTER-EMPRESA] ([id_empresa])
GO
ALTER TABLE [dbo].[Control-Punto-Venta] CHECK CONSTRAINT [FK_Control-Punto-Venta_MASTER-EMPRESA]
GO
ALTER TABLE [dbo].[Control-Punto-Venta]  WITH CHECK ADD  CONSTRAINT [FK_Control-Punto-Venta_UBIGEO] FOREIGN KEY([ubic-dis-departa])
REFERENCES [dbo].[UBIGEO] ([id_ubicacion])
GO
ALTER TABLE [dbo].[Control-Punto-Venta] CHECK CONSTRAINT [FK_Control-Punto-Venta_UBIGEO]
GO
ALTER TABLE [dbo].[MASTER-EMPRESA]  WITH CHECK ADD  CONSTRAINT [FK_MASTER-EMPRESA_cestados] FOREIGN KEY([id_estado])
REFERENCES [dbo].[cestados] ([id-estado])
GO
ALTER TABLE [dbo].[MASTER-EMPRESA] CHECK CONSTRAINT [FK_MASTER-EMPRESA_cestados]
GO
ALTER TABLE [dbo].[MASTER-EMPRESA]  WITH CHECK ADD  CONSTRAINT [FK_MASTER-EMPRESA_UsuarioMaster] FOREIGN KEY([id_usuario])
REFERENCES [dbo].[UsuarioMaster] ([id_usu_master])
GO
ALTER TABLE [dbo].[MASTER-EMPRESA] CHECK CONSTRAINT [FK_MASTER-EMPRESA_UsuarioMaster]
GO
ALTER TABLE [dbo].[UsuarioMaster]  WITH CHECK ADD  CONSTRAINT [FK_UsuarioMaster_cestados] FOREIGN KEY([id_estado])
REFERENCES [dbo].[cestados] ([id-estado])
GO
ALTER TABLE [dbo].[UsuarioMaster] CHECK CONSTRAINT [FK_UsuarioMaster_cestados]
GO
/****** Object:  StoredProcedure [dbo].[sp_crearEmpresa]    Script Date: 10/10/2019 3:41:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

--crear procedimiento empresa
create proc [dbo].[sp_crearEmpresa]
@id_usuario int,
@nomEmpresa varchar(50),
@rucEmpresa varchar(11)
AS
begin
insert into [MASTER-EMPRESA] values (@nomEmpresa,@rucEmpresa,3,@id_usuario)
end

GO
/****** Object:  StoredProcedure [dbo].[sp_masteEmpresa]    Script Date: 10/10/2019 3:41:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
--crear procedimiento de usuario y empresa

create proc [dbo].[sp_masteEmpresa]
@nomUsuario varchar(50),
@apellido varchar(50),
@dni varchar(9),
@usuario varchar(50),
@pass varchar(50),
@nomEmpresa varchar(50),
@rucEmpresa varchar(11)
AS
BEGIN
-- procedimiento sirbe para crear empresa
declare @id_usuario int 
--insertar usuario master
INSERT INTO UsuarioMaster values (@nomUsuario,@apellido,@dni,@usuario,@pass,3);
--el ultimo registro puesto 
set @id_usuario = (select top 1 id_usu_master from UsuarioMaster order by 1 desc)
-- insertar empresa
insert into [MASTER-EMPRESA] values (@nomEmpresa,@rucEmpresa,3,@id_usuario)
END
GO
/****** Object:  StoredProcedure [dbo].[sp_UsuarioM]    Script Date: 10/10/2019 3:41:52 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create proc [dbo].[sp_UsuarioM]
@nomUsuario varchar(50),
@apellido varchar(50),
@dni varchar(9),
@usuario varchar(50),
@pass varchar(50)
AS
BEGIN
INSERT INTO UsuarioMaster values (@nomUsuario,@apellido,@dni,@usuario,@pass,3);
END
GO
USE [master]
GO
ALTER DATABASE [EmpresaControl] SET  READ_WRITE 
GO
