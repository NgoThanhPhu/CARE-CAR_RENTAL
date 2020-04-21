create database accounts
go
use accounts
go

create table godusers(
    id int PRIMARY KEY IDENTITY,
    name nvarchar(255) not null,
    email nvarchar(255) not null,
    username NVARCHAR(30) not null,
    pwd NVARCHAR(30) not null 
)