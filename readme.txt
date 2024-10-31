=== Scroll Baner ===
Contributors: Andrzej 'andy' Kidaj
Tags: scroll, baner, header
Requires at least: 3.0
Tested up to: 3.4.2
Stable tag: 2.5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Sleek, multi-layered, animated banner for use in the page header.

== Description ==

Scroll Banner allows you to easily animate multiple layers of graphics in the header of the page (as in the http://ad3.eu). As each layer can move at a different speed get peudo-3D effect.
For each layer you have to prepare the appropriate image file (ie seamless end must fit perfectly to the beginning) in PNG format (due to transparency). Each graphics can have different widths, but they should have the same height. We load the graphics system configuration tab, set some additional parameters, add the template to the desired location <div id="name"></ div> and you're done :)
The downloaded files can be viewed (eye icon appears) or deleted if the layer is not necessary (will not be added to the container).

== Installation ==

1. Wgranie pakietu Scroll Baner do folderu '/wp-content/plugins/' WordPressa i w³¹czenie wtyczki.
2. Przygotowanie odpowiednich grafik w formacie PNG - o dowolnej szerokoœci ale takiej samej wysokoœci ka¿dy.
3. Utworzenie w dowolnie wybranym miejscu szablonu kontenera o wybranej nazwie: <div id="nazwa_kontenera"></div>
4. Wczytanie grafik do systemu i ustawienie dodatkowych parametrów:
	- Nazwa identyfikatora kontenera - wybrana nazwa kontenera zawieraj¹cego baner.
	- Wysokoœæ kontenera - wysokoœæ plików graficznych.
	- OpóŸnienie ruchu banera - tak naprawdê jest to pauza miêdzy kolejnymi fazazmi ruchu. Im wiêksza wartoœæ, tym wolniejsza (i bardziej skokowa) animacja. Zalecana wartoœæ to 40.
	- Plik graficzny warstwy X - tu wczytujemy odpowiedni plik z grafik¹. Warstwa pierwsza to ta najbardziej oddalona, która powinna poruszaæ siê najwolniej, ostatnia jest najbli¿ej
	- Szybkoœæ ruchu warstwy - im wiêksza wartoœæ tym szybszy ruch. Zaleca siê nieprzekraczanie wartoœæi 100.



1. Scroll Banner upload the package to the folder '/ wp-content/plugins /' WordPress and the inclusion of plug-ins.
2. Preparation of appropriate images in PNG format - any width but the same height each.
3. The creation in any place the container on the selected template name: <div id="container_name"></div>
4. Load images into the system and set additional parameters:
	- The name of the container identifier - the name chosen container with banner (eg "container_name")
	- The height of the container - the amount of image files.
	- Delay banner traffic - it really is a pause between successive phases of movement. The higher the value, the slower (and more displacement) animation. The recommended value is 40
	- File graphical layer X - here we load the appropriate image file. The first layer is the farthest that should move slowly, the last one is the closest.
	- The rate of movement of the layer - the higher the number, the faster the movement. It is recommended not to exceed the value of 100.

== Changelog ==

= 1.0 =
The first stable version of the plugin.