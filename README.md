# **Karel Robot - 2D Grid Application**

Tento projekt implementuje jednoduchého robota **Karel**, který se pohybuje po 2D herním poli a vykonává příkazy zadané uživatelem. Projekt je realizován ve dvou variantách:

1. **PHP** (server-side) verze  
2. **JavaScript** (client-side) verze  

## **Obsah**

1. [Funkce aplikace](#funkce-aplikace)  
2. [Jak aplikace funguje](#jak-aplikace-funguje)  
3. [Instalace a spuštění](#instalace-a-spuštění)  
4. [Struktura příkazů](#struktura-příkazů)  
5. [Verze aplikace](#verze-aplikace)  
6. [Ukázka použití](#ukázka-použití)

---

## **Funkce aplikace**

- Robot **Karel** se pohybuje po 2D mřížce o velikosti **10x10**.
- Uživatel zadává textové příkazy, které robot vykonává:
  - Posun robota vpřed (`KROK`)
  - Otočení doleva (`VLEVO`)
  - Položení písmena na aktuální pole (`POLOZ`)
  - Resetování hry (`RESET`)
- Aplikace vizualizuje aktuální stav herního pole a polohu robota.

---

## **Jak aplikace funguje**

### **PHP Verze (server-side)**  
- Příkazy se zadají do textového pole a odešlou formulářem na server.  
- Server zpracuje příkazy pomocí PHP a vrátí aktualizované herní pole.  

**Souborová struktura:**
```
project/
│-- index.php       # Frontend s formulářem
│-- karel.php       # PHP script zpracovávající příkazy
```

### **JavaScript Verze (client-side)**  
- Příkazy se zpracují přímo v prohlížeči pomocí JavaScriptu.  
- Aktualizované herní pole je zobrazeno dynamicky bez potřeby serveru.

**Souborová struktura:**
```
project/
│-- index.html      # HTML soubor s JavaScriptem a CSS
```

---

## **Instalace a spuštění**

### **PHP Verze**  
1. Nakopírujte soubory `index.php` a `karel.php` do vašeho serverového adresáře (např. `htdocs` pro XAMPP).  
2. Spusťte server (XAMPP, WAMP nebo jiný).  
3. Otevřete webový prohlížeč a přejděte na `http://localhost/index.php`.  

### **JavaScript Verze**  
1. Otevřete soubor `index.html` v libovolném moderním webovém prohlížeči.  
2. Aplikace je okamžitě připravena k použití.

---

## **Struktura příkazů**

Každý příkaz se zadává na **nový řádek**.  
Příkazy mohou být psány **velkými** nebo **malými** písmeny.

### **Dostupné příkazy:**

1. **KROK [číslo]**  
   - Posune robota o zadaný počet kroků ve směru, kterým je otočen.  
   - Např.: `KROK 4` (posune o 4 kroky).  

2. **VLEVO [číslo]**  
   - Otočí robota doleva o 90° jednou nebo vícekrát.  
   - Např.: `VLEVO 2` (otočí 2x doleva).  

3. **POLOZ [písmeno]**  
   - Položí písmeno na aktuální pozici robota.  
   - Např.: `POLOZ A` (položí písmeno "A").  

4. **RESET**  
   - Resetuje herní pole a nastaví robota do výchozí pozice (levý horní roh).

---

## **Verze aplikace**

### **1. PHP Verze**
- Vhodná pro aplikace s backendem, kde se logika zpracovává na serveru.  
- Aktualizace herního pole vyžaduje odeslání formuláře.

### **2. JavaScript Verze**
- Rychlá a dynamická varianta bez potřeby serveru.  
- Vše probíhá v prohlížeči uživatele.

---

## **Ukázka použití**

### **Zadání příkazů**

Například:
```
KROK 3
VLEVO
KROK 2
POLOZ X
RESET
```

### **Výsledek**  
- Robot se posune o 3 kroky vpřed.  
- Otočí se doleva.  
- Posune se o 2 kroky a položí písmeno **X**.  
- Nakonec se hra resetuje.

