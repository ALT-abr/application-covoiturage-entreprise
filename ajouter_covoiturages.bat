@echo off
chcp 65001 >nul
cd /d "%~dp0"
echo Ajout de covoiturages a venir...
echo.
"C:\xampp\php\php.exe" "%~dp0scripts\ajouter_covoiturages.php"
echo.
pause
