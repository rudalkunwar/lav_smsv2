# Frontend Asset Compilation - Important Note

## Current Situation

The **old project (lav_sms)** uses **Webpack Mix** for asset compilation:

-   File: `webpack.mix.js`
-   Build commands: `npm run dev`, `npm run prod`
-   Assets referenced with `mix()` helper in Blade templates

The **new project (lav_smsv2)** uses **Vite** (Laravel 12 default):

-   File: `vite.config.js`
-   Build commands: `npm run dev`, `npm run build`
-   Assets referenced with `@vite()` directive in Blade templates

## ⚠️ Action Required

You have **TWO OPTIONS**:

### Option 1: Migrate to Vite (Recommended)

**Advantages:**

-   Modern, faster build tool
-   Better HMR (Hot Module Replacement)
-   Laravel 12 standard
-   Future-proof

**Steps:**

1. Review all Blade templates that use `mix()` helper
2. Replace `mix('css/app.css')` with `@vite(['resources/css/app.css'])`
3. Update asset imports in JavaScript files
4. Configure `vite.config.js` appropriately
5. Test all pages to ensure assets load correctly

**Example Changes:**

```blade
<!-- Old (Webpack Mix) -->
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<script src="{{ mix('js/app.js') }}"></script>

<!-- New (Vite) -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

### Option 2: Keep Using Webpack Mix

**Advantages:**

-   No need to update templates
-   Existing configuration works
-   Less migration effort

**Steps:**

1. Copy `webpack.mix.js` from old project:

    ```bash
    copy ..\lav_sms\webpack.mix.js webpack.mix.js
    ```

2. Update `package.json` to use Mix instead of Vite:

    ```json
    {
        "scripts": {
            "dev": "npm run development",
            "development": "mix",
            "watch": "mix watch",
            "watch-poll": "mix watch -- --watch-options-poll=1000",
            "hot": "mix watch --hot",
            "prod": "npm run production",
            "production": "mix --production"
        },
        "devDependencies": {
            "axios": "^1.1.2",
            "laravel-mix": "^6.0.49",
            "lodash": "^4.17.19",
            "postcss": "^8.1.14"
        }
    }
    ```

3. Install dependencies:

    ```bash
    npm install
    ```

4. Remove Vite:

    ```bash
    npm uninstall vite laravel-vite-plugin
    ```

5. Build assets:
    ```bash
    npm run dev
    ```

## Current Asset Structure

Based on the migration, your assets are in:

-   `public/assets/` - Migrated from old project
-   `public/global_assets/` - Migrated from old project
-   `resources/js/` - May need JavaScript files copied
-   `resources/css/` or `resources/sass/` - May need CSS/SASS files copied

## Recommendation

For a **quick migration with minimal changes**: Use **Option 2 (Keep Webpack Mix)**

For a **modern, future-proof setup**: Use **Option 1 (Migrate to Vite)**

## Additional Resources & Files to Copy

If you choose **Option 2 (Webpack Mix)**, also copy these files:

```bash
# Copy webpack.mix.js
copy ..\lav_sms\webpack.mix.js webpack.mix.js

# Copy JavaScript resources if not already present
xcopy /E /I ..\lav_sms\resources\js resources\js

# Copy SASS resources if not already present
xcopy /E /I ..\lav_sms\resources\sass resources\sass
```

## Testing Asset Loading

After setting up your chosen option:

1. Start the development server:

    ```bash
    php artisan serve
    ```

2. Build assets (in a separate terminal):

    ```bash
    # For Vite:
    npm run dev

    # For Mix:
    npm run watch
    ```

3. Visit your application and check:
    - CSS styles are loading
    - JavaScript is working
    - No 404 errors in browser console
    - Images and fonts are displaying

## Need Help?

If assets aren't loading:

1. Check browser console for errors
2. Verify paths in Blade templates
3. Ensure build process completed without errors
4. Clear browser cache
5. Run `php artisan config:clear` and `php artisan cache:clear`

---

**Last Updated**: Migration Date  
**Status**: Action Required - Choose your asset compilation strategy
