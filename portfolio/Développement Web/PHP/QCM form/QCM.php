<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QCM</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: lightblue;
            font-family: Arial, sans-serif;
            color: black;

        }
        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }
        .question {
            background-color: white;
            border-style: none;
            border-radius: 10px;
            width: 100%;
            padding: 20px;
            box-shadow: 2px 2px 5px gray;
        }
        input[name="valider"] {
            width: 100%;
            padding: 4px 50px;
            margin: 0 auto;
            background-color: white;
            color: #90D5FF;
            font-weight: bold;
            font-size: 18px;
            border-style: none;
            cursor: pointer;
            box-shadow: 1px 1px 5px gray;
        }
        input[name="valider"]:hover {
            opacity: 0.8;
        }
        .buttonRadio {
            margin-top: 6px;
        }
        label {
            font-weight: bold;
        }

    </style>
<body>
    <?php
        $reponsesCorr = array(
            'Q1' => 'c',
            'Q2' => 'a',
            'Q3' => 'c',
            'Q4' => 'b',
            'Q5' => 'd'
        );
        $score = 0;
        function signe($valeur, $bonneReponse, $choixUser) {
            global $score;
            if (!isset($choixUser)) {
                return "";
            }
            if ($valeur === $choixUser && $valeur === $bonneReponse) {
                $score++;
                return "<span style='color:green; margin-left: 20px;'>✔</span>";
                
            }
            elseif ($valeur === $choixUser && $valeur !== $bonneReponse) {
                return "<span style='color:red; margin-left: 20px;'>✘</span>";
            }
            elseif ($valeur === $bonneReponse && $choixUser !== $bonneReponse) {
                return "<span style='color:green; margin-left: 20px;'>✔</span>";
            }
            return "";
        }
    ?>
    <form method="POST" action="#">
        <div class="question">
            <label for="Q1">Quel langage est principalement utilisé pour le développement web côté client ?</label><br>
            <div class="buttonRadio">
                <input type="radio" name="Q1" id="R1" value="a" <?php if (isset($_POST['Q1']) && $_POST['Q1'] == 'a') echo "checked"; ?>>Python<?php echo signe('a', $reponsesCorr['Q1'], $_POST['Q1'] ?? null); ?><br>
                <!-- ?? sinifie que Si la clé existe, utilise sa valeur. Sinon, utilise null. -->
                <input type="radio" name="Q1" id="R2" value="b" <?php if (isset($_POST['Q1']) && $_POST['Q1'] == 'b') echo "checked"; ?>>Java<?php echo signe('b', $reponsesCorr['Q1'], $_POST['Q1'] ?? null); ?><br>
                <input type="radio" name="Q1" id="R3" value="c" <?php if (isset($_POST['Q1']) && $_POST['Q1'] == 'c') echo "checked"; ?>>JavaScript<?php echo signe('c', $reponsesCorr['Q1'], $_POST['Q1'] ?? null); ?><br>
                <input type="radio" name="Q1" id="R4" value="d" <?php if (isset($_POST['Q1']) && $_POST['Q1'] == 'd') echo "checked"; ?>>C++<?php echo signe('d', $reponsesCorr['Q1'], $_POST['Q1'] ?? null); ?><br>
            </div>
        </div>

        <div class="question">
            <label for="Q2">Que signifie "CPU" en informatique ?</label><br>
            <div class="buttonRadio">
                <input type="radio" name="Q2" id="R1" value="a" <?php if (isset($_POST['Q2']) && $_POST['Q2'] == 'a') echo "checked"; ?>>Central Processing Unit<?php echo signe('a', $reponsesCorr['Q2'], $_POST['Q2'] ?? null); ?><br>
                <input type="radio" name="Q2" id="R2" value="b" <?php if (isset($_POST['Q2']) && $_POST['Q2'] == 'b') echo "checked"; ?>>Computer Personal Unit<?php echo signe('b', $reponsesCorr['Q2'], $_POST['Q2'] ?? null); ?><br>
                <input type="radio" name="Q2" id="R3" value="c" <?php if (isset($_POST['Q2']) && $_POST['Q2'] == 'c') echo "checked"; ?>>Control Program Utility<?php echo signe('c', $reponsesCorr['Q2'], $_POST['Q2'] ?? null); ?><br>
                <input type="radio" name="Q2" id="R4" value="d" <?php if (isset($_POST['Q2']) && $_POST['Q2'] == 'd') echo "checked"; ?>>Central Programming Unit<?php echo signe('d', $reponsesCorr['Q2'], $_POST['Q2'] ?? null); ?><br>
            </div>
        </div>

        <div class="question">
            <label for="Q3">Quel est le rôle principal d’un système d’exploitation ?</label><br>
            <div class="buttonRadio">
                <input type="radio" name="Q3" id="R1" value="a" <?php if (isset($_POST['Q3']) && $_POST['Q3'] == 'a') echo "checked"; ?>>Gérer les sites web<?php echo signe('a', $reponsesCorr['Q3'], $_POST['Q3'] ?? null); ?><br>
                <input type="radio" name="Q3" id="R2" value="b" <?php if (isset($_POST['Q3']) && $_POST['Q3'] == 'b') echo "checked"; ?>>Compiler les programmes<?php echo signe('b', $reponsesCorr['Q3'], $_POST['Q3'] ?? null); ?><br>
                <input type="radio" name="Q3" id="R3" value="c" <?php if (isset($_POST['Q3']) && $_POST['Q3'] == 'c') echo "checked"; ?>>Gérer les ressources matérielles et logicielles<?php echo signe('c', $reponsesCorr['Q3'], $_POST['Q3'] ?? null); ?><br>
                <input type="radio" name="Q3" id="R4" value="d" <?php if (isset($_POST['Q3']) && $_POST['Q3'] == 'd') echo "checked"; ?>>Créer des présentations<?php echo signe('d', $reponsesCorr['Q3'], $_POST['Q3'] ?? null); ?><br>
            </div>
        </div>

        <div class="question">
            <label for="Q4">Lequel de ces logiciels est un système de gestion de base de données ?</label><br>
            <div class="buttonRadio">
                <input type="radio" name="Q4" id="R1" value="a" <?php if (isset($_POST['Q4']) && $_POST['Q4'] == 'a') echo "checked"; ?>> MS Word<?php echo signe('a', $reponsesCorr['Q4'], $_POST['Q4'] ?? null); ?><br>
                <input type="radio" name="Q4" id="R2" value="b" <?php if (isset($_POST['Q4']) && $_POST['Q4'] == 'b') echo "checked"; ?>>Oracle<?php echo signe('b', $reponsesCorr['Q4'], $_POST['Q4'] ?? null); ?><br>
                <input type="radio" name="Q4" id="R3" value="c" <?php if (isset($_POST['Q4']) && $_POST['Q4'] == 'c') echo "checked"; ?>>Adobe Photoshop<?php echo signe('c', $reponsesCorr['Q4'], $_POST['Q4'] ?? null); ?><br>
                <input type="radio" name="Q4" id="R4" value="d" <?php if (isset($_POST['Q4']) && $_POST['Q4'] == 'd') echo "checked"; ?>>Eclipse<?php echo signe('d', $reponsesCorr['Q4'], $_POST['Q4'] ?? null); ?><br>
            </div>
        </div>

        <div class="question">
            <label for="Q5">Quelle structure de données fonctionne selon le principe FIFO (First In, First Out) ?</label><br>
            <div class="buttonRadio">
                <input type="radio" name="Q5" id="R1" value="a" <?php if (isset($_POST['Q5']) && $_POST['Q5'] == 'a') echo "checked"; ?>> Pile (Stack)<?php echo signe('a', $reponsesCorr['Q5'], $_POST['Q5'] ?? null); ?><br>
                <input type="radio" name="Q5" id="R2" value="b" <?php if (isset($_POST['Q5']) && $_POST['Q5'] == 'b') echo "checked"; ?>>Tableau (Array)<?php echo signe('b', $reponsesCorr['Q5'], $_POST['Q5'] ?? null); ?><br>
                <input type="radio" name="Q5" id="R3" value="c" <?php if (isset($_POST['Q5']) && $_POST['Q5'] == 'c') echo "checked"; ?>>Liste chaînée (Linked List)<?php echo signe('c', $reponsesCorr['Q5'], $_POST['Q5'] ?? null); ?><br>
                <input type="radio" name="Q5" id="R4" value="d" <?php if (isset($_POST['Q5']) && $_POST['Q5'] == 'd') echo "checked"; ?>>File (Queue)<?php echo signe('d', $reponsesCorr['Q5'], $_POST['Q5'] ?? null); ?><br>
            </div>
        </div>
        <div>
            <input type="submit" name="valider" value="Valider">
        </div>
    </form>
    <div style="margin-top: 20px;">Votre Score est : <?php echo "$score"; ?></div>


</body>
