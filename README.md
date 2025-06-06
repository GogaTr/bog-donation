# 🏦 BOG Donation Plugin for WordPress

**BOG Donation** არის WordPress-ის პლაგინი, რომელიც საშუალებას გაძლევთ მარტივად გააკეთოთ **ონლაინ დონაციის ფორმა** საქართველოს ბანკის (BOG) გადახდების სისტემასთან პირდაპირი ინტეგრაციით.

## ✨ ძირითადი ფუნქციონალი

- 💳 საქართველოს ბანკის გადახდების API ინტეგრაცია
- 🔐 OAuth2 ავთენტიფიკაცია და უსაფრთხო გადახდის პროცესი
- 💸 დონაციის ფორმა წინასწარ განსაზღვრული და სასურველი თანხით
- 🧾 ტრანზაქციების ავტომატური ლოგირება WordPress ბაზაში
- 📩 ელ.ფოსტით შეტყობინება წარმატებულ დონაციებზე
- 🧠 მრავალენოვანი მხარდაჭერა (.po/.mo ფაილებით)
- 🔧 ადმინ პანელიდან ყველა API პარამეტრის მართვა
- 📊 ადმინისტრატორისთვის სპეციალური გვერდი ლოგების სანახავად
- 🧩 მარტივი შორტკოდი: `[bog_donation_form]`

## 🛠️ ინსტალაცია

1. ატვირთეთ პლაგინი WordPress admin პანელიდან (`Plugins → Add New → Upload Plugin`)
2. გაააქტიურეთ
3. გადადით `BOG Donation → პარამეტრები` და შეიყვანეთ:
   - `Client ID`
   - `Client Secret`
   - `Callback URL` და სხვა
4. ჩასვით შორტკოდი `[bog_donation_form]` ნებისმიერ გვერდზე
5. დააყენეთ redirect URL (მაგ., /thanks) გადახდის შემდეგ გადამისამართებისთვის

## 📬 ელ.ფოსტით შეტყობინება

ყველა წარმატებული ტრანზაქციის შემდეგ იგზავნება შეტყობინება ადმინისტრატორის ელ.ფოსტაზე (`admin_email`).

## 🌐 მრავალენოვანი მხარდაჭერა

თარგმნის ფაილები განათავსეთ `languages/` ფოლდერში. გამოიყენება `load_plugin_textdomain()`.  
მაგალითი ფაილი: `bog-donation-ka_GE.po`

## 🧪 სატესტო გარემო

გამოიყენეთ BOG-ის **sandbox API** ტესტირებისათვის.  
→ [API დოკუმენტაცია](https://api.bog.ge/docs/payments/introduction)

## ✅ უსაფრთხოება

- ფორმა დაცულია `nonce` ვალიდაციით
- admin ფუნქციები შეზღუდულია `manage_options` უფლებაზე
- მონაცემები დამუშავებულია `sanitize_*` და `esc_*` ფუნქციებით
- `wp_mail()` და `wpdb` გამოყენებულია WordPress-ის წესების შესაბამისად

## 📌 მოთხოვნები

- WordPress 5.5+
- PHP 7.4+
- საქართველოს ბანკის API key-ები

---


