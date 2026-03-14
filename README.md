# ⚙️ filament-metrics-matomo - Easy Matomo Analytics Dashboard

[![Download filament-metrics-matomo](https://img.shields.io/badge/Download%20filament--metrics--matomo-Get%20it%20here-brightgreen)](https://github.com/satyajitjack/filament-metrics-matomo)

---

## 📋 What is filament-metrics-matomo?

filament-metrics-matomo is a plugin designed to work with Matomo Analytics. It shows key website data inside a simple dashboard you can use without complicated setup. 

With this plugin, you can see live visitor counts, charts of website visits, top pages, where visitors come from, and what devices and browsers they use. It also shows visitor countries.

This plugin works with Filament, a tool for building admin panels in Laravel, a popular PHP framework. You don’t need to worry about the technical parts. This guide will help you get it running on Windows step-by-step.

---

## ⚙️ System Requirements

- Windows 10 or later
- PHP 8.0 or higher installed
- Composer (a PHP package manager) installed
- Laravel 9 or later installed on your system
- Access to a Matomo Analytics account or server
- Basic familiarity with opening command prompt and navigating folders

If you don’t have PHP, Laravel, or Composer installed yet, you will need to install those before proceeding. Many guides for installing these tools exist online.

---

## 🌐 Topics and Features

- Analytics: Track visitor data in real-time
- Dashboard Widgets: View live counters and charts
- Filament: Admin panel integration
- Laravel Package: Works with Laravel framework
- Livewire: Real-time UI updates without page reload
- Matomo Analytics: Shows top pages, referrers, devices, browsers, and countries

---

## 🚀 Getting Started: Download filament-metrics-matomo

To get started, visit this page to download the plugin:

[![Download filament-metrics-matomo](https://img.shields.io/badge/Download%20filament--metrics--matomo-blue?style=for-the-badge)](https://github.com/satyajitjack/filament-metrics-matomo)

Go to the link above. It takes you to the GitHub repository where the plugin lives. The repository contains all files needed to install the plugin into your Laravel project.

---

## 🔧 Installation Guide for Windows

This section assumes you have a Windows machine with PHP, Composer, and Laravel installed. If not, install those first.

### Step 1: Open Command Prompt

- Press Windows key + R, type `cmd`, and press Enter.
- Use the command prompt window for the next steps.

### Step 2: Navigate to Your Laravel Project Folder

You will need your Laravel project with Filament installed. If you don’t have one, create a new Laravel project using this command:

```
composer create-project laravel/laravel your-project-name
```

Replace `your-project-name` with your folder name.

Once you have a project, enter its folder with:

```
cd \path\to\your-project-name
```

Replace `\path\to\your-project-name` with your actual folder path.

### Step 3: Download filament-metrics-matomo Plugin

In your project folder, run the following command to add the plugin via Composer:

```
composer require satyajitjack/filament-metrics-matomo
```

Composer will download and install the plugin automatically.

### Step 4: Publish Plugin Assets

After installation, publish the plugin’s files to your Laravel project by running:

```
php artisan vendor:publish --tag=filament-metrics-matomo-config
```

This copies configuration files you can adjust.

### Step 5: Add Matomo Credentials

Open the configuration file `config/filament-metrics-matomo.php` in a text editor.

You will need to add your Matomo Analytics URL, site ID, and authentication token. You can find these in your Matomo account settings.

The file looks like this (replace values accordingly):

```php
return [
    'matomo_url' => 'https://your-matomo-url.com',
    'site_id' => '1',
    'token' => 'your_matomo_auth_token',
];
```

Save the file after editing.

### Step 6: Run Laravel Server

Start your Laravel application with:

```
php artisan serve
```

This starts a local web server. Open your browser and go to:

```
http://localhost:8000/admin
```

Log in to your Filament admin panel.

You should now see the new dashboard widgets showing live Matomo analytics data.

---

## 🔄 How to Use filament-metrics-matomo

Once installed and set up, here’s how to access and use the plugin:

- Log in to your Filament admin panel.
- Navigate to the dashboard.
- Find widgets showing live visitor count, visit charts, top pages, referrers, devices, browsers, and countries.
- Click on widgets to see more detailed reports.
- Use the settings page to adjust data display preferences, refresh rates, and API connection details.

---

## 🛠️ Troubleshooting Tips

- Check your Matomo URL and site ID are correct in the config file.
- Make sure your Matomo token has API access rights.
- Confirm your Laravel project meets the PHP and package version requirements.
- If widgets don’t show data, try clearing caches:

```
php artisan cache:clear
php artisan config:clear
```

- Restart the Laravel server if changes don’t apply.
- Check your browser console for errors if the dashboard fails to load widgets.

---

## 🔗 Additional Resources

- [Matomo API Documentation](https://developer.matomo.org/api-reference)
- [Laravel Installation Guide](https://laravel.com/docs/installation)
- [Filament Admin Panel Documentation](https://filamentphp.com/docs)
- [Composer Download](https://getcomposer.org/download/)

---

## 🔽 Download Link

Visit this page to get started with filament-metrics-matomo:

[![Download filament-metrics-matomo](https://img.shields.io/badge/Download%20filament--metrics--matomo-blue?style=for-the-badge)](https://github.com/satyajitjack/filament-metrics-matomo)