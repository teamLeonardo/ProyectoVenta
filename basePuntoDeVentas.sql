USE [master]
GO
/****** Object:  Database [PuntoDeVenta]    Script Date: 10/10/2019 3:39:41 AM ******/
CREATE DATABASE [PuntoDeVenta]
GO
ALTER DATABASE [PuntoDeVenta] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET ARITHABORT OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [PuntoDeVenta] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [PuntoDeVenta] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET  DISABLE_BROKER 
GO
ALTER DATABASE [PuntoDeVenta] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [PuntoDeVenta] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET RECOVERY SIMPLE 
GO
ALTER DATABASE [PuntoDeVenta] SET  MULTI_USER 
GO
ALTER DATABASE [PuntoDeVenta] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [PuntoDeVenta] SET DB_CHAINING OFF 
GO
ALTER DATABASE [PuntoDeVenta] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [PuntoDeVenta] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [PuntoDeVenta] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'PuntoDeVenta', N'ON'
GO
USE [PuntoDeVenta]
GO
/****** Object:  Table [dbo].[cState]    Script Date: 10/10/2019 3:39:42 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cState](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
 CONSTRAINT [PK_cState] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[detalle_entrada]    Script Date: 10/10/2019 3:39:43 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[detalle_entrada](
	[id] [int] NOT NULL,
	[id_entrada] [int] NULL,
	[costo_unitario] [decimal](10, 0) NULL,
	[cantidad] [int] NULL,
	[idProducto] [int] NULL,
 CONSTRAINT [PK_detalle_entrada] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[detalle_perdida]    Script Date: 10/10/2019 3:39:43 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[detalle_perdida](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_perdida] [int] NULL,
	[costo_unitario] [decimal](10, 2) NULL,
	[idProducto] [int] NULL,
	[cantidad] [int] NULL,
 CONSTRAINT [PK_detalle_perdida] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[detalle_venta]    Script Date: 10/10/2019 3:39:43 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[detalle_venta](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[id_venta] [int] NULL,
	[costo_unitario] [decimal](10, 2) NULL,
	[precio_unitario] [decimal](10, 2) NULL,
	[cantidad] [int] NULL,
	[idProducto] [int] NULL,
 CONSTRAINT [PK_detalle_venta] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[entrada]    Script Date: 10/10/2019 3:39:43 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[entrada](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[fecha] [datetime] NULL,
	[total] [decimal](10, 2) NULL,
	[idState] [int] NULL,
 CONSTRAINT [PK_entrada] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[perdida]    Script Date: 10/10/2019 3:39:43 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[perdida](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[fecha] [datetime] NULL,
	[idState] [int] NOT NULL,
	[total] [decimal](10, 2) NULL,
 CONSTRAINT [PK_perdida] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[producto]    Script Date: 10/10/2019 3:39:43 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[producto](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](50) NULL,
	[codigo] [varchar](50) NULL,
	[idState] [int] NULL,
	[fecha] [datetime] NULL,
	[precio] [decimal](10, 2) NULL,
	[costo] [decimal](10, 2) NULL,
	[existencia] [int] NULL,
 CONSTRAINT [PK_producto] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[venta]    Script Date: 10/10/2019 3:39:43 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[venta](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[total] [decimal](10, 2) NULL,
	[fecha] [datetime] NULL,
	[idState] [int] NULL,
 CONSTRAINT [PK_venta] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[cState] ON 
GO
INSERT [dbo].[cState] ([id], [nombre]) VALUES (1, N'Activo')
GO
INSERT [dbo].[cState] ([id], [nombre]) VALUES (2, N'Inactivo')
GO
INSERT [dbo].[cState] ([id], [nombre]) VALUES (3, N'Eliminado')
GO
SET IDENTITY_INSERT [dbo].[cState] OFF
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [IX_producto]    Script Date: 10/10/2019 3:39:43 AM ******/
CREATE NONCLUSTERED INDEX [IX_producto] ON [dbo].[producto]
(
	[codigo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
GO
ALTER TABLE [dbo].[detalle_entrada]  WITH CHECK ADD  CONSTRAINT [FK_detalle_entrada_entrada] FOREIGN KEY([id])
REFERENCES [dbo].[entrada] ([id])
GO
ALTER TABLE [dbo].[detalle_entrada] CHECK CONSTRAINT [FK_detalle_entrada_entrada]
GO
ALTER TABLE [dbo].[detalle_entrada]  WITH CHECK ADD  CONSTRAINT [FK_detalle_entrada_producto] FOREIGN KEY([idProducto])
REFERENCES [dbo].[producto] ([id])
GO
ALTER TABLE [dbo].[detalle_entrada] CHECK CONSTRAINT [FK_detalle_entrada_producto]
GO
ALTER TABLE [dbo].[detalle_perdida]  WITH CHECK ADD  CONSTRAINT [FK_detalle_perdida_perdida] FOREIGN KEY([idProducto])
REFERENCES [dbo].[producto] ([id])
GO
ALTER TABLE [dbo].[detalle_perdida] CHECK CONSTRAINT [FK_detalle_perdida_perdida]
GO
ALTER TABLE [dbo].[detalle_perdida]  WITH CHECK ADD  CONSTRAINT [FK_detalle_perdida_perdida1] FOREIGN KEY([id_perdida])
REFERENCES [dbo].[perdida] ([id])
GO
ALTER TABLE [dbo].[detalle_perdida] CHECK CONSTRAINT [FK_detalle_perdida_perdida1]
GO
ALTER TABLE [dbo].[detalle_venta]  WITH CHECK ADD  CONSTRAINT [FK_detalle_venta_venta] FOREIGN KEY([id])
REFERENCES [dbo].[venta] ([id])
GO
ALTER TABLE [dbo].[detalle_venta] CHECK CONSTRAINT [FK_detalle_venta_venta]
GO
ALTER TABLE [dbo].[entrada]  WITH CHECK ADD  CONSTRAINT [FK_entrada_cState] FOREIGN KEY([idState])
REFERENCES [dbo].[cState] ([id])
GO
ALTER TABLE [dbo].[entrada] CHECK CONSTRAINT [FK_entrada_cState]
GO
ALTER TABLE [dbo].[perdida]  WITH CHECK ADD  CONSTRAINT [FK_perdida_cState] FOREIGN KEY([idState])
REFERENCES [dbo].[cState] ([id])
GO
ALTER TABLE [dbo].[perdida] CHECK CONSTRAINT [FK_perdida_cState]
GO
ALTER TABLE [dbo].[producto]  WITH CHECK ADD  CONSTRAINT [FK_producto_cState] FOREIGN KEY([idState])
REFERENCES [dbo].[cState] ([id])
GO
ALTER TABLE [dbo].[producto] CHECK CONSTRAINT [FK_producto_cState]
GO
ALTER TABLE [dbo].[venta]  WITH CHECK ADD  CONSTRAINT [FK_venta_cState] FOREIGN KEY([idState])
REFERENCES [dbo].[cState] ([id])
GO
ALTER TABLE [dbo].[venta] CHECK CONSTRAINT [FK_venta_cState]
GO
USE [master]
GO
ALTER DATABASE [PuntoDeVenta] SET  READ_WRITE 
GO
