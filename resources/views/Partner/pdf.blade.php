<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device PDF</title>
</head>
<body>
<h1>MoonRepair</h1>
<h2>{{$customer[0]->firmName}}</h2>
<div style="position: absolute; right: 75px; top: 50px;">
<h3>#{{$device->id}}</h3>
</div>
<p>{{$customer[0]->email}}</p>
<a>{{$customer[0]->name}}</a><br />
<a>{{$customer[0]->street}}</a>
<a>{{$customer[0]->zip}}</a>
<a>{{$customer[0]->city}}</a><br />
<p>{{$customer[0]->phone}}</p>
<table class="GeneratedTable">
<tbody>
  <tr>
    <td>Gerät:</td>
    <td>{{$device->model}}</td>
  </tr>
     <tr>
    <td>Gerätesperrcode:</td>
    <td>{{$device->pinCode}}</td>
  </tr>
     <tr>
    <td>SIM-Pin:</td>
    <td>{{$device->simCode}}</td>
  </tr>

    <tr>
    <td>Defekt:</td>
    <td>{{$device->error}}</td> 
    </tr>
     <tr>
    <td>Datenrettung:</td>
    <?php 
        if($device->dataRecovery == 1){
            $dataRecoveryStatus = "Ja";
        }else{
            $dataRecoveryStatus = "Nein";
        }
    ?>
    <td>{{$dataRecoveryStatus}}</td>
  </tr>
     <tr>
    <td>Bearbeitungsdatum und Uhrzeit:</td>
    <td>{{$device->created_at}}</td> 
  </tr>

<tr>
<td>zusätzliche Info:</td>
<td>{{$device->description}}</td> 
</tr>
<tr>
<td>IMEI:</td>
<td>{{$device->imei}}</td> 
</tr>
<tr>
<td>Zubehör:</td>
<td>{{$device->accessories}}</td> 
</tr>
<tr>
  <td>Kostenfreigabe bis:</td>
  <td>{{$device->price}}</td> 
</tr>
</tbody>
</table>
<div style=''><p style='font-size: 10px;'>
            Hinweis: Es werden nur als 'defekt' angegebene Komponenten durch den Techniker ersetzt. Weitere Schäden am Gerät können trotz größter Sorgfalt nicht ausgeschlossen werden. Der Komplettaustausch durch den Hersteller kann im Nachgang nicht garantiert werden.
            <br />Bei Mainboardreparaturen: Der Erfolg einer Mainboardreparatur kann trotz größter Sorgfalt nicht garantiert werden.Weitere Schäden können auftreten. Gegebenenfalls startet das Gerät im Nachgang nicht mehr. In diesem Fall werden die zur Abschirmung dienenden Bleche am Mainboard nicht angebracht. Ein Komplettaustausch durch Apple kann ebenfalls nicht garantiert werden.
            <br />
            Kann die Reparatur ohne unser Verschulden nicht gemäß des vorliegenden Auftrags ausgeführt werden, behalten wir uns die Berechnung einer Aufwandspauschale zwischen 19,- Euro (bei Handys) oder 29,- Euro (bei Tablets) vor.
            <br />
            Alle Reparaturleistungen beziehen sich auf Schäden außerhalb der Herstellergarantie. Die Reparaturleistung erfolgt nicht im Rahmen der Herstellergarantie und ist nicht von dem Hersteller autorisiert.
            <br />
            Sofern eine Reparatur stattgefunden hat, erlischt die gegebene Herstellergarantie. Für Reparaturen werden keine Original-Ersatzteile von dem Hersteller, sondern Ersatzteile in Erstausrüster-Qualität oder Refurbed-Qualität verwendet. Vor Abgabe des Gerätes sollte der Kunde ein aktuelles Backup von dem Gerät erstellen. Für Datenverlust übernehmen wir keine Haftung!
            <br />

            Ich bestätige hiermit, dass ich der legale Eigentümer des oben aufgeführten Produktes bin (oder der vom Eigentümer explizit Bevollmächtigte).<br />
            Hiermit erkenne ich die bei MoonRepair ausgehängten AGB bzw. im Internet abgebildeten AGB an.<br />
            </p>
            <a style='font-size: 15px;'>MoonRepair, Hornschuchallee 31, 91301 Forchheim, 09191-3510380</a></div>
            <p>
                <br>
            <div style=''>
            Abgabe
            <br />
            <a style='float: left;'>Unterschrift des Kunden:</a><br />
            <br />

            <br /><br />
            <br />
            <a style='float: left;'>Unterschrift eines Mitarbeiters:</a>
            </p>

            <div style='float:right; margin-top:-120px;'><a style='font-size: 15px;'>Abholung<br />Unterschrift des Kunden:</a><br />

            <br />
            <br /><br />
            <br />
            <a style='font-size: 12px;'>Unterschrift eines Mitarbeiters:</a></div>
            </div>
</body>
</html>