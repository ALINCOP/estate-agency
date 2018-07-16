
CREATE procedure total_apartamente()
begin
SELECT COUNT(id_apartament) as apartamente_total

FROM apartamente;
end;

call total_apartamente();


CREATE procedure total_case1()
begin
SELECT COUNT(id_casa) as case_total


FROM case_vile;
end;

call total_case1();

CALL `total_apartamente`();

CREATE procedure total_terenuri()
begin
SELECT COUNT(id_teren) as terenuri_total


FROM terenuri;
end;

call total_terenuri();


create or replace view v_apartamente_lista_imagine as
SELECT a.id_apartament, a.titlu, a.camere, a.pret, a.localitate, a.an_constructie, a.suprafata, a.info, a.Etaj, a.tip_contract, i.locatie_imagine as imagine 
    FROM apartamente a join imagini i 
    ON a.id_apartament=i.id_apartament
    GROUP BY a.id_apartament;
		
		select * from v_apartamente_lista_imagine;


create or replace view v_case_lista_imagine as
SELECT c.id_casa, c.titlu, c.camere, c.pret_casa, c.localitate, c.an_constructie, c.suprafata, c.garaj, c.piscina, c.info, c.tip_contract, i.locatie_imagine as imagine 
    FROM case_vile c join imagini i 
    ON c.id_casa=i.id_casa
    GROUP BY c.id_casa;
		
		select * from v_case_lista_imagine;

create or replace view v_terenuri_lista_imagine as
SELECT t.id_teren, t.titlu, t.pret, t.localitate, t.suprafata, t.tip_teren, t.info, t.tip_contract, i.locatie_imagine as imagine 
    FROM terenuri t join imagini i 
    ON t.id_teren=i.id_teren
    GROUP BY t.id_teren;
		
select * from v_terenuri_lista_imagine;

create or replace view v_terenuri_vanzare as
SELECT t.id_teren, t.titlu, t.pret, t.localitate, t.suprafata, t.tip_teren, t.info, t.tip_contract, i.locatie_imagine as imagine 
    FROM terenuri t join imagini i 
    ON t.id_teren=i.id_teren
    WHERE t.tip_contract="De vanzare"
    GROUP BY t.id_teren;
		
select * from v_terenuri_vanzare;

create or replace view v_terenuri_vanzare_alba as
SELECT t.id_teren, t.titlu, t.pret, t.localitate, t.suprafata, t.tip_teren, t.info, t.tip_contract, i.locatie_imagine as imagine 
    FROM terenuri t join imagini i 
    ON t.id_teren=i.id_teren
    WHERE t.tip_contract="De vanzare" and t.localitate="Alba-Iulia"
    GROUP BY t.id_teren;
		
select * from v_terenuri_vanzare_alba;

create or replace view v_terenuri_vanzare_Cluj as
SELECT t.id_teren, t.titlu, t.pret, t.localitate, t.suprafata, t.tip_teren, t.info, t.tip_contract, i.locatie_imagine as imagine 
    FROM terenuri t join imagini i 
    ON t.id_teren=i.id_teren
    WHERE t.tip_contract="De vanzare" and t.localitate="Cluj-Napoca"
    GROUP BY t.id_teren;
		
select * from v_terenuri_vanzare_cluj;

create or replace view v_terenuri_vanzare_sibiu as
SELECT t.id_teren, t.titlu, t.pret, t.localitate, t.suprafata, t.tip_teren, t.info, t.tip_contract, i.locatie_imagine as imagine 
    FROM terenuri t join imagini i 
    ON t.id_teren=i.id_teren
    WHERE t.tip_contract="De vanzare" and t.localitate="Sibiu"
    GROUP BY t.id_teren;
		
select * from v_terenuri_vanzare_sibiu;

create or replace view v_terenuri_inchiriere as
SELECT t.id_teren, t.titlu, t.pret, t.localitate, t.suprafata, t.tip_teren, t.info, t.tip_contract, i.locatie_imagine as imagine 
    FROM terenuri t join imagini i 
    ON t.id_teren=i.id_teren
    WHERE t.tip_contract="De inchiriere"
    GROUP BY t.id_teren;
		
		select * from v_terenuri_inchiriere;
		
		
create or replace view v_apartamente_inchiriere as
SELECT a.id_apartament, a.titlu, a.camere, a.pret, a.localitate, a.an_constructie, a.suprafata, a.info, a.Etaj, a.tip_contract, i.locatie_imagine as imagine 
    FROM apartamente a join imagini i 
    ON a.id_apartament=i.id_apartament
    WHERE a.tip_contract="De inchiriere"
    GROUP BY a.id_apartament;
		
		select * from v_apartamente_inchiriere;


create or replace view v_apartamente_vanzare as
SELECT a.id_apartament, a.titlu, a.camere, a.pret, a.localitate, a.an_constructie, a.suprafata, a.info, a.Etaj, a.tip_contract, i.locatie_imagine as imagine 
    FROM apartamente a join imagini i 
    ON a.id_apartament=i.id_apartament
    WHERE a.tip_contract="De vanzare"
    GROUP BY a.id_apartament;
		
		select * from v_apartamente_vanzare;
		
create or replace view v_case_vanzare as
SELECT c.id_casa, c.titlu, c.camere, c.pret_casa, c.localitate, c.an_constructie, c.suprafata, c.garaj, c.piscina, c.info, c.tip_contract, i.locatie_imagine as imagine 
    FROM case_vile c join imagini i 
    ON c.id_casa=i.id_casa
    WHERE c.tip_contract="De vanzare"
    GROUP BY c.id_casa;
		
		select * from v_case_vanzare;
		
		create or replace view v_case_inchiriere as
SELECT c.id_casa, c.titlu, c.camere, c.pret_casa, c.localitate, c.an_constructie, c.suprafata, c.garaj, c.piscina, c.info, c.tip_contract, i.locatie_imagine as imagine 
    FROM case_vile c join imagini i 
    ON c.id_casa=i.id_casa
    WHERE c.tip_contract="De inchiriere"
    GROUP BY c.id_casa;
		
		select * from v_case_inchiriere;