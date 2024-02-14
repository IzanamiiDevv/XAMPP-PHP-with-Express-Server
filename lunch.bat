@echo off
title Lunching the app...
start "" "dist/lunch.exe"

timeout /t 4 /nobreak >nul

start "" "http://localhost:3000"
exit
