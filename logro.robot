*** Settings ***
Documentation
***
Library Selenium2Library
*** Variables ***
${Server}       https://dev.smartcar.in.th/
${Browser}      chrome
${DELAY}        5s
${Login}        https://${Server}/login
${WELCOME URL}  https://${Server}/admin/home
${ERROR}        https://${Server}/login

*** Test Cases ***
Login Test
    Open Browser    ${URL}    ${BROWSER}
    Input Text      id=username    YourUsername
    Input Password  id=password    YourPassword
    Click Button    css=.btn-hero
    # Add additional steps or verifications as needed
    Close Browser
