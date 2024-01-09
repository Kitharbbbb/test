*** Settings ***
Library  SeleniumLibrary
Library  OperatingSystem

*** Variables ***
${Browser}         chrome
${WebsiteURL}      https://dev.smartcar.in.th/login
${Username}        test01
${Password}        12345678!
${TargetURL}       https://dev.smartcar.in.th/admin/driving-jobs

*** Test Cases ***
Login and Navigate to Driving Jobs
    Open Browser  ${WebsiteURL}  ${Browser}
    Maximize Browser Window
    Set Selenium Speed  0.5s

    Input Text  id=username  ${Username}
    Input Text  id=password  ${Password}

    Click Button  xpath=//button[@type='submit']

    # Wait for the page to load after login
    Wait Until Page Contains  Welcome Page  timeout=20s

    # Log the current page title
    ${title}=  Get Title
    Log  Current Page Title: ${title}

    # Capture screenshot after login
    Capture Page Screenshot  login_success.png

    # Verify successful login
    Page Should Contain  Welcome Page

    # Log the current page title after login
    ${title_after_login}=  Get Title
    Log  Page Title After Login: ${title_after_login}

    # Navigate to the specified URL
    Click Element  xpath=//a[@href='${TargetURL}']

    # Capture screenshot for debugging
    Capture Page Screenshot  after_navigation.png

    # Add any additional steps specific to the target page
    # ...

    Close Browser

*** Keywords ***
Capture Page Screenshot
    ${timestamp}=  Get Time  epoch  UTC
    Capture Page Screenshot  screenshot_${timestamp}.png
