# Projekt stacji pogodowej z raportowaniem na stronie internetowej

# Spis treści

1. Wprowadzenie
2. Wdrożenie i konfiguracja aplikacji
    1. Konfiguracja aplikacji
    2. Wdrożenie aplikacji
3. Podzespoły
    1. Specyfikacja podzespołów
    2. Schemat połączenia podzespołów
4. Komunikacja z aplikacją internetową   
5. Baza danych  
6. Dostęp do pomiarów
    1. Adresy i ograniczenia
    2. Pobieranie danych
    3. Wysyłanie danych do aplikacji internetowej

# **Wprowadzenie**

Celem projektu jest zbudowanie stacji pogodowej z możliwością prezentowania pomiarów na stronie www.

Wykorzystane podzespoły:

- Arduino RP2040;
- Czujnik temperatury oraz wilgotności powietrza DHT 11;
- Fotorezystor;
- Opornik;
- Płytka prototypowa;
- Zestaw przewodów;

Wykorzystane narzędzia:

- PhpStorm 2021.1;
- Arduino IDE;
- Modelio 4.1;
- Fritzing 0.9.3.b.64.pc;

Aplikacja internetowa za pomocą której prezentowane są pomiary, hostowana jest w usłudze Microsoft Azure na platformie Windows w wersji 32 bitowej. Zasoby zlokalizowane są w Niemczech Środkowo-Zachodnich.

Zebrane dane z czujników przesyłane są przez interfejs API przygotowanego do tego celu mikroserwisu, który został napisany w języku PHP w oparciu o framework Lumen w wersji 8.0. Dane przechowywane są w bazie SQLite.

Pomiary dostępne są pod adresem: [https://iotdane.azurewebsites.net/](https://iotdane.azurewebsites.net/)

# **Wdrożenie i konfiguracja aplikacji**

## **Konfiguracja aplikacji**

Aplikacja napisana jest w języku PHP w wersji 7.4. W komunikacji wykorzystywany jest protokół http w wersji 2 (HTTP/2). Połączenie jest na stałe przekierowane na połączenie szyfrowane HTTPS, a minimalna wersja TLS wymagana przez aplikację to 1.2. Koligacja ARR została wyłączona ze względu na charakter bezstanowy aplikacji.

## **Wdrożenie aplikacji**

Wdrażanie aplikacji wykonywane jest automatycznie dzięki integracji z serwisem GitHub, tj. przy wprowadzaniu zmian do gałęzi master. Poniżej przedstawiony został schemat procesu wdrożenia zmian w aplikacji oraz kroki procesu w serwisie GitHub.

_Rysunek 1 Schemat wdrożenia aplikacji._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz1.png)

_Źródło 1. Opracowanie własne na podstawie danych z serwisu GitHub._

_Rysunek 2. Proces tworzenia i wdrożenie na platformę Azure._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz2.png)

_Źródło 2. Opracowanie własne._

# **Podzespoły**

## **Specyfikacja podzespołów**

    1. Płytka Arduino Nano RP2040 Connect:

_Tabela 1. Specyfikacja płytki Arduino Nano RP2040 Connect._


 **Mikrokontroler** | Raspberry Pi RP2040       |               |
| :---              |    :----:                 |          :--- |
| **Piny**          | Pin wbudowanej diody      | 13        |
|                   | Cyfrowe piny              | 20        |
|                   | Analogowe piny            | 8        |
|                   | Piny PWM                  | 20 (z wyjątkiem A6 oraz A7)        |    
| **Łączność**      | Wi-Fi                     | Moduł Nina W102 uBlox        |    
|                   | Bluetooth                 | Moduł Nina W102 uBlox        |    
|                   | Moduł zabezpieczeń        | ATECC608A-MAHDA-T Crypto IC       |    
|  **Sensory**      | IMU                       | LSM6DSOXTR (6 osi)        |    
|                   | Mikrofon                  | MP34DT05        |  
| **Komunikacja** | UART | Tak |
|| I2C | Tak |
|| SPI | Tak |
| **Zasilanie** | Napięcie we/wy | 3.3V |
|| Napięcie wejściowe (nominalne) | 5-18V |
|| Prąd we/wy na pin | 12 mA |
| **Taktowanie zegara** | Procesor | 133 MHz |
| **Pamięć** | AT25SF128A-MHB-T | 16MB Flash IC |
|| Moduł Nina W102 uBlox | 448 KB ROM, 520KB SRAM, 16MB Flash |


_Źródło 3. Opracowanie własne na podstawie [https://docs.arduino.cc/hardware/nano-rp2040-connect](https://docs.arduino.cc/hardware/nano-rp2040-connect)_

    1. Czujnik temperatury oraz wilgotności powietrza DHT 11:

_Tabela 2. Specyfikacja czujnika DHT-11._

| **Zasilanie**             | 3 - 5.5V                              |
| :---                      |    :----                             |
| **Pomiar temperatury:**   | Zakres pomiaru temperatury 0 - 50 °C |
|| Dokładność +/- 2°C |
|| Czas odpowiedzi 6 - 15 s (typowo 10 s) |
| **Pomiar wilgotności** | Zakres pomiaru wilgotności 20% - 90% RH (przy temperaturze 0°C-50°C) |
| Zakres pomiarowy| 6 - 30 s |
| Dokładność| +/- 5% RH |

_Źródło 4. Opracowanie własne na podstawie [https://datasheetspdf.com/datasheet/DHT11.html](https://datasheetspdf.com/datasheet/DHT11.html)_

    1. Fotorezystor:

_Tabela 3. Specyfikacja fotorezystora._

| Rezystancja jasna | 5-10 K Ohm |
| --- | --- |
| Rezystancja ciemna | 0.5 M Ohm |

_Źródło 5. Opracowanie własne na podstawie [https://www.kth.se/social/files/54ef17dbf27654753f437c56/GL5537.pdf](https://www.kth.se/social/files/54ef17dbf27654753f437c56/GL5537.pdf)_

    1. Opornik o wartości 1k Ohma i tolerancji 5% (odczytano z kodu paskowego oraz zmierzono miernikiem).

## **Schemat połączenia podzespołów**

_Rysunek 3. Płytka prototypowa wraz z komponentami._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz3.png)
_Źródło 6. Opracowanie własne w programie Fritzing._

_Rysunek 4. Schemat połączenia._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz4.png)

_Źródło 7. Opracowanie własne w programie Fritzing._

# **Komunikacja z aplikacją internetową**

Płytka Arduino komunikując się z czujnikami z określonym w kodzie interwałem czasu (25 sekund) pobiera dane dotyczące temperatury, wilgotności powietrza oraz poziomu światła. Następnie przez sieć WIFI zebrane dane wysyłane są metodą POST do interfejsu API aplikacji internetowej. Otrzymane dane zapisywane są w bazie SQLite.

_Rysunek 5. Schemat komunikacji stacji pogodowej z aplikacją internetową._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz5.png)

_Źródło 8. Opracowanie własne w programie Modelio._

# **Baza danych**

Dane przechowywane są w bazie danych SQLite.

Baza danych zawiera cztery tabele:

1. Tabela _logs_ przechowuje wpisy związane z pojedynczym pomiarem, zawiera ona sześć pól w których przechowywane są:
1. _id_ – unikatowy numer pomiaru.
2. _Light_ – zmierzony poziom światła.
3. _created\_at_ – data utworzenia pomiaru.
4. updated\_at – data modyfikacji pomiaru.
5. _Temp_ – zmierzona temperatura.
6. _Hum_ – zmierzona wilgotność powietrza.
2. Tabela _migrations_ (generowana z poziomu frameworka lumen) zawiera definicje schematu bazy danych.
3. Tabela _sqlite\_master_ przechowuje opis wszystkich innych tabel, indeksów, wyzwalaczy oraz widoków.
4. Tabela _sqlite\_sequence_ zawiera ostatni numer sekwencyjny kolumn typu autoincrement.

_Rysunek 6. Schemat bazy danych._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz6.png)

_Źródło 9. Opracowanie własne w programie PhpStorm.._

# **Dostęp do pomiarów**

## **Adresy i ograniczenia**

W utworzonym serwisie dostępne są następujące adresy na które zostały nałożone następujące limity:

- Dla adresu: [https://iotdane.azurewebsites.net/](https://iotdane.azurewebsites.net/) (widok responsywny, dane ładowane są asynchronicznie co 30 sekund) ograniczenie 260 żądań na godzinę;
- Dla adresu: [https://iotdane.azurewebsites.net/index.php/logs](https://iotdane.azurewebsites.net/index.php/logs) (czyste dane w formacie JSON) 260 żądań na godzinę;
- Dla adresu: [https://iotdane.azurewebsites.net/index.php/tabela](https://iotdane.azurewebsites.net/index.php/tabela) (dane w formacie tabelki) 260 żądań na godzinę;

## **Pobieranie danych**

Dostęp do danych można uzyskać:

1. Za pomocą przeglądarki internetowej pod adresem: [https://iotdane.azurewebsites.net/](https://iotdane.azurewebsites.net/). W celu bardziej przejrzystej prezentacji dodano widok tabeli w układzie responsywnym.

_Rysunek 7. Widok strony w przeglądarce www._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz7.png)

_Źródło 10. Opracowanie własne._

Dla urządzeń mobilnych z małym ekranem kolumna z datą została ukryta.

_Rysunek 8. Widok strony na urządzeniu mobilnym._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz8.png)

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz9.png)

_Źródło 11. Opracowanie własne._

1. Za pomocą przeglądarki internetowej pod adresem: [https://iotdane.azurewebsites.net/index.php/logs](https://iotdane.azurewebsites.net/index.php/logs) Dane zwracane są w formacie JSON.

_Rysunek 9 Widok zwróconych danych w przeglądarce w formacie JSON._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz10.png)

_Źródło 12. Opracowanie własne._

1. Za pomocą konsoli wysyłając żądanie GET np.: [https://iotdane.azurewebsites.net/index.php/logs](https://iotdane.azurewebsites.net/index.php/logs) | json\_pp

_Rysunek 10. Widok danych w konsoli._

![](https://projekty.azurewebsites.net/screens/IoTDane/Obraz11.png)

_Źródło 13. Opracowanie własne._

## **Wysyłanie danych do aplikacji internetowej**

Pomiary wysyłane są metodą POST wykorzystując autoryzację typu Basic Auth. W przypadku nieprawidłowych danych autoryzacyjnych serwis zwróci komunikat „Brak autoryzacji&quot; lub „Brak nagłówka autoryzującego&quot; ze statusem 401. Status 201 oraz komunikat „dodano&quot; : true oznacza pomyślne dodanie pomiaru do zasobów.
