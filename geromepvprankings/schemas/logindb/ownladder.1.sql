create table ownladder (
guild_id int(11) not null default '0' primary key,
name varchar(24) not null default '',
currentown smallint(6) unsigned not null default '0',
highestown smallint(6) unsigned not null default '0',
owntime datetime
) engine = myisam; 