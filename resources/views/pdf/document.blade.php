<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat d'inscription</title>
    <style>
        /* Styles CSS pour la mise en page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .title {
            /* background-color: antiquewhite; */
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            padding: 3px;
        }
        #t1{
            text-align: center; 
            /* font-weight: bold; */
            font-style: italic;
        }

        .info-section {
            margin-top: 20px;
            border: solid 1px blue;
            padding: 5px;
            text-align: center;
        }
        .info-label {
            font-weight: bold;
        }
        .separator {
            border-top: 1px solid #000;
            margin: auto;
            text-align: center;
        }
        .signature {
            text-align: center;
        }
        .signature-label {
            display: inline-block;
            width: 40%;
            text-align: center;

        }
       h3{
            text-align: center;
            color: white;
            background-color: silver;
            text-transform: uppercase;
            padding: 3px;

        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title" style="color: #0086bb;"> 
            {{-- <img src="{{ $logo }}" alt="Logo">  --}}
            {{-- <h2 style="font-size: 2em;">{{ strtoupper($appname) }}  <br><small id="t1" style="font-size: 0.5em;">Learning & Coaching</small></h2> --}}
              </div>
           
              <div class="title">
<p style="text-align: center;">              
      <img src="{{ storage_path('app/public/dummy.jpg') }}" style="width: 100px; height: 100px">
</p>
                <h3 style="background-color: silver;">Fiche d'inscription</h3>
              </div>
        
        <div class="info-section">
            <p class="info-label">ECOLE DE LANGUES, FORMATION & COURS DE SOUTIEN </p>
            <p class="info-label">RC n° :23B0191498 00/06   NIF : 00230619149848</p>
            <p class="info-label">E-mail:vigacenter.recrute@gmail.com :</p>
            <p class="info-label">Rue des Frères Ouakouche Cité Remla Ighil Ouazoug Béjaia </p>
          
        </div>
        {{-- <div class="separator"></div> --}}
        <div class="title"><h3>INFORMATIONS</h3></div>
        <p>Assurez vous de lire attentivement les instructions du formulaire d'inscription et de fournir toutes les informations nécessaires .</p>
       <div style="padding: 10px; margin: auto;">
        <table >
            <tr>
                <td><span class="info-label">Nom :</span></td>
                <td>{{ $eleve->nom }}</td>
            </tr>
            <tr>
                <td><span class="info-label">Prénom :</span></td>
                <td>{{ $eleve->prenom }}</td>
            </tr>
            <tr>
                <td><span class="info-label">Date de naissance :</span></td>
                <td>{{ $eleve->date_naissance }}</td>
            </tr>
            <tr>
                <td><span class="info-label">Adresse :</span></td>
                <td>{{ $eleve->adresse }}</td>
            </tr>
            <tr>
                <td><span class="info-label">Niveau d'étude :</span></td>
                <td>{{ $eleve->niv }}</td>
            </tr>
            <tr>
                <td><span class="info-label">Offre :</span></td>
                <td>{{ $eleve->offre }}</td>
            </tr>
        </table>
       </div>
        
        <br>
        <div class="separator"></div> 
        <div> <p style="text-align: center;">Béjaia le {{ date('d/m/Y') }}</p></div>
        <div class="signature">
            <div >
                <p style="text-align: left;">
                    Signature de l'administration <br>
                    
                </p>
                <p style="text-align: right;">
                    Signature de l'intéressé <br>
                   
                </p>
            </div>
         
        </div>
    </div>
    <div style="page-break-after: always;" ></div>
    <h3 style="font-weight: bold;text-align: center;">Contrat d'inscription </h3>
    <p>
        Bienvenue au VIGA CENTER ,nous débutons toute nouvelle relation avec un abonné par le biais d'un contrat . Ce contrat énonce ce que vous pouvez attendre de nous et ce que nous attendons de vous .Votre signature indique vous étes d'accord avec ce qui est stipulé ci-dessous.</p>
        <p style="font-weight: bold;">Article 01 :</p>
        <p>
            L'école ne peut etre tenue responsable en cas d'inexécution de ses obligations résultant d'un évenementde force majeure.Sont considérés comme cas de force majeure ou cas fortuit,outre ceux habituellement reconnus et sans que cette liste soit restrictive:la maladie ou l'accident d'un formateur,les grèves ou conflits sociaux ou externes, les catastrophes naturelles, les incendies .
        </p>
        <p style="font-weight: bold;">
            Article 02: 
        </p>
        <p>
            Dans le souci d'améliorer constamment ses programmes,l'école se réserve le droit,à tout moment,de changer d'intervenant,de cours,de planing ou d'apporter toute modification au programme dans un souci de qualité pédagogique.
        </p>
        <p style="font-weight: bold;">
            Article 03: 
        </p>
        <p>
            Toute dégradation de matériel par un apprenant fait l'objet d'une demandede remboursement aux parents, sur la bas du cout réel de réparation ou de remplacement pour la part non prise en charge par les assurences . 
        </p>
        <p style="font-weight: bold;">
            Article 04: 
        </p>
        <p>
            en cas d'exclusion en cours pour motif disciplinaire, manque de travail ou d'assiduité,l'intégralite des frais de scolarité reste due a l'école .
        </p>
        <p style="font-weight: bold;">
            Article 05: 
        </p>
        <p>
            En cas de désistement d'un client n'ayant entamé aucune formation,ce dernier se verra perdre 25% du montant payé .
        </p>
        <p style="font-weight: bold;">
            Article 06: 
        </p>
        <p>
            Le client perd ses droits après un abandon d'une durée de trois mois .
        </p>
        <p style="font-weight: bold;">
            Article 07: 
        </p>
        <p>
            Toute personne ayant entamé plus de deux séances n'a plus droit au remboursement .Toute personne ayant effectué une permutation devra se conformer au réglement de l'école et n'a plus le droit d'effectuer une secande permutation .En cas de désistement,la personne perd tout droit de remboursement . 
        </p>
        <p style="font-weight: bold;">
            Article 08: 
        </p>
        <p>
            L'école se réserve la possibilité de modifier ou mettre à jour ses conditions générales de vente à tout moment .
        </p>
        <p style="text-align: right; font-weight: bold">
               Signature
        </p>



</body>
</html>
