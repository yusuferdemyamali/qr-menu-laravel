# Security Best Practices for Laravel Projects

## 1. Authentication & Authorization

- **Authentication:**
  - Laravel Breeze / Fortify / Jetstream kullanılabilir
  - Güçlü parola politikaları zorunlu (min 8 karakter, harf + rakam + özel karakter)
  - İki faktörlü doğrulama (2FA) opsiyonel ama önerilir
- **Authorization:**
  - Role-Based Access Control (RBAC) kullan
  - Policy ve Gate mekanizmaları ile yetki kontrolü yapılmalı

---

## 2. Input Validation & Sanitization

- **Validation:**
  - Tüm form verileri `Request` sınıflarında validate edilmeli
  - Regex veya Laravel validator ile özel doğrulama
- **Sanitization:**
  - XSS önleme için tüm çıktılar `{{ }}` ile escape edilmeli
  - HTML input gerekiyorsa `Purifier` gibi kütüphaneler kullanılmalı

---

## 3. Passwords & Secrets

- **Password Hashing:** Laravel’in bcrypt veya argon2 mekanizması
- **Environment Variables:** API key, DB password gibi değerler `.env` dosyasında tutulmalı
- **Never Commit Secrets:** Kod tabanına gizli anahtar, parola veya token girilmemeli

---

## 4. Database Security

- **SQL Injection:** Prepared statements veya Eloquent ORM kullanımı ile önlenmeli
- **Mass Assignment Protection:** `$fillable` veya `$guarded` kullan
- **Data Encryption:** Hassas veriler şifrelenmeli (örn. AES-256)

---

## 5. Web Security

- **CSRF Protection:** Laravel’in `@csrf` ve CSRF middleware’i kullanımı zorunlu
- **HTTPS:** Tüm site HTTPS üzerinden çalışmalı, HSTS kullanılabilir
- **Headers:** X-Frame-Options, X-XSS-Protection, Content Security Policy eklenmeli

---

## 6. File Upload Security

- Dosya türü ve boyutu doğrulaması yapılmalı
- Dosya isimleri sanitize edilmeli, kullanıcı tarafından belirlenmemeli
- Yüklenen dosyalar public dizine direkt erişimle açılmamalı, storage üzerinden servis edilmeli

---

## 7. Logging & Monitoring

- Laravel Loglar günlük veya rotasyon ile tutulmalı
- Hata ve güvenlik olayları izlenmeli (örn. Sentry, Bugsnag)
- Admin paneli veya kritik işlemler loglanmalı

---

## 8. Session & Cookie Security

- `Secure` ve `HttpOnly` cookie flag’leri aktif olmalı
- Session timeout ve yeniden doğrulama kuralları belirlenmeli
- Session hijacking ve fixation önlemleri alınmalı

---

## 9. Third-Party Packages

- Sadece güvenilir ve aktif bakımı yapılan paketler kullanılmalı
- Paket güncellemeleri düzenli takip edilmeli
- Kullanılmayan paketler projeden kaldırılmalı

---

## 10. Deployment Security

- Production ortamında debug mod kapalı (`APP_DEBUG=false`)
- Backup ve rollback planları hazır olmalı
- Sunucu güvenlik önlemleri: firewall, fail2ban, SSL, en son PHP versiyonu

---

## 11. Notes

- Kurumsal projelerde OWASP Top 10 rehberi göz önünde bulundurulmalı
- Proje özelinde ekstra güvenlik önlemleri burada not edilebilir
