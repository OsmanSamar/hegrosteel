#!/bin/bash

WORKING_DIR="$1"
if [ -z "$WORKING_DIR" ]; then
    WORKING_DIR="$(pwd)"
fi

cd "$WORKING_DIR"

echo "[+] Converting old theme to new theme"

echo "[+] Cloning new theme to tmp directory"
mkdir /tmp/default-wordpress-theme
git clone https://bitbucket.org/wilco375/default-wordpress-theme /tmp/default-wordpress-theme

echo "[+] Removing old files"
rm -rf fonts webfonts src/bower_components src/node_modules src/.bowerrc src/*.json src/*.js, src/yarn.lock .gitignore src/scss/pages/_login.scss css js

echo "[+] Copying new files"
cp /tmp/default-wordpress-theme/.gitignore .
cp /tmp/default-wordpress-theme/package.json .
cp /tmp/default-wordpress-theme/package-lock.json .
cp /tmp/default-wordpress-theme/webpack.config.js .
cp /tmp/default-wordpress-theme/src/scss/pages/_login.scss src/scss/pages/_login.scss

echo "[+] Removing new theme from tmp directory"
rm -rf /tmp/default-wordpress-theme

# Replace "//=include ../bower_components/bootstrap/dist/js/bootstrap.min.js" with new imports
echo "[+] Updating script.min.js"
sed -i "s/\/\/=include ..\/bower_components\/bootstrap\/dist\/js\/bootstrap.min.js/import 'babel-polyfill'\nimport 'bootstrap'\n\n\/\/ Styling\nimport '..\/scss\/style.scss'\n\n\/\/ Fontawesome\nimport { dom, library } from '@fortawesome\/fontawesome-svg-core'\nimport { faFacebookF, faTwitter, faInstagram, faLinkedinIn } from '@fortawesome\/free-brands-svg-icons'\nlibrary.add(faFacebookF, faTwitter, faInstagram, faLinkedinIn)\ndom.watch()/" src/js/script.js
if grep -q "//=include" src/js/script.js; then
    echo "[!] Libraries found in script.js that cannot automatically be updated. Please update them manually."
fi

echo "[+] Updating style.scss"
sed -i "/@import \"..\/bower_components\/fontawesome\/scss\/solid\";/d" src/scss/style.scss
sed -i "/@import \"..\/bower_components\/fontawesome\/scss\/brands\";/d" src/scss/style.scss
sed -i "/@import \"..\/bower_components\/fontawesome\/scss\/fontawesome\";/d" src/scss/style.scss
sed -i "/@import \"fonts\";/d" src/scss/style.scss
sed -i "s/@import \"..\/bower_components\/bootstrap\/scss\/bootstrap\";/\@import \"~bootstrap\";/" src/scss/style.scss
if grep -q "@import \"../bower_components" src/scss/style.scss; then
    echo "[!] Libraries found in style.scss that cannot automatically be updated. Please update them manually."
fi

echo "[+] Updating to FontAwesome 6"
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/fab/fa-brands/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/fas/fa-solid/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/far/fa-regular/g" {} \;
echo "[!] Please update your styling and script for FontAwesome icons manually if you used any."

echo "[+] Updating to Bootstrap 5"
# Replace ml, mr, pl, pr etc. with ms, me, ps, pe in all scss or php files
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/ml-/ms-/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/mr-/me-/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/pl-/ps-/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/pr-/pe-/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/float-left/float-start/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/float-right/float-end/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/text-left/text-start/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/text-right/text-end/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/font-weight-/fw-/" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/font-style-/fst-/" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/embed-responsive/ratio/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/ratio-16by9/ratio-16x9/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/ratio-4by3/ratio-4x3/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/data-toggle/data-bs-toggle/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/data-target/data-bs-target/g" {} \;
find . -not -path "./node_modules/*" -name "*.scss" -o -name "*.php" -exec sed -i "s/data-dismiss/data-bs-dismiss/g" {} \;

echo "[+] Installing dependencies"
yarn install

echo "[+] Running webpack"
yarn build
