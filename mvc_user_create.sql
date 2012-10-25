USE [MvcMusicStore]
GO

/****** Object:  Table [dbo].[mvc_user]    Script Date: 06/21/2012 11:21:49 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE TABLE [dbo].[mvc_user](
	[username] [nvarchar](20) NOT NULL,
	[password] [nvarchar](20) NOT NULL,
	[email] [nvarchar](50) NOT NULL,
	[is_admin] [bit] NOT NULL,
 CONSTRAINT [PK_mvc_user] PRIMARY KEY CLUSTERED 
(
	[username] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

ALTER TABLE [dbo].[mvc_user] ADD  CONSTRAINT [DF_mvc_user_is_admin]  DEFAULT ((0)) FOR [is_admin]
GO


