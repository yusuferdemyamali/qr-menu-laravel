# Development Rules

## 1. Coding Standards

- **Language Standards:**
  - [Örn. PHP 8.3 PSR-12 coding standard kullanılacak]
  - [Örn. JavaScript için ES2023 standardı kullanılacak]
- **Naming Conventions:**
  - Class & Model: PascalCase
  - Functions & Methods: camelCase
  - Variables: snake_case
  - Database Tables: plural_snake_case
- **Formatting:**
  - Satır uzunluğu max 120 karakter
  - 4 boşluk indentation (tab yerine boşluk)
  - Zorunlu code linting (PHP-CS-Fixer, ESLint, Prettier)

---

## 2. Git & Version Control Rules

- **Branching Model:** [Gitflow / Trunk-based / Feature Branches]
- **Commit Messages:**
  - Format: `type(scope): short description`
  - Örn: `feat(auth): add password reset feature`
  - Types: feat, fix, docs, style, refactor, test, chore
- **Merging:**
  - `main` branch korumalı
  - Sadece squash merge veya rebase merge kullanılacak

---

## 3. Project Structure

- **Backend (Laravel):**
  - Controller’lar ince, Service katmanı kullan
  - Model ilişkileri Eloquent üzerinden tanımlanmalı
  - Routes RESTful prensiplerle organize edilmeli
- **Frontend:**
  - Tekrar kullanılabilir component yapısı
  - Style dosyaları modüler olacak (örn. SCSS, Tailwind)
- **File Naming:**
  - Dosya isimleri küçük harf ve tire ile (`user-profile.blade.php`)

---

## 4. Documentation Rules

- **Code Documentation:**
  - Public method’larda PHPDoc / JSDoc kullanılacak
- **Project Documentation:**
  - `README.md` güncel tutulmalı
  - API’ler için Swagger / Postman Collection
- **Comments:**
  - Gereksiz yorumlardan kaçınılmalı
  - Yalnızca “neden” açıklaması gereken yerlerde kullanılmalı

---

## 5. Testing Rules

- **Unit Tests:** Her yeni fonksiyon için test yazılmalı
- **Feature Tests:** Kritik iş akışları test edilmeli 
- **Coverage Goal:** Minimum %70 test coverage
- **Tools:** PHPUnit / Pest (backend), Jest / Vitest (frontend)

---

## 6. Performance Rules

- **Database:**
  - N+1 sorgulardan kaçınılmalı
  - Index kullanılmalı
- **Caching:**
  - Config cache, route cache, query cache aktif olmalı
- **Code Optimization:**
  - Gereksiz dependency yüklenmemeli
  - Lazy loading yerine eager loading tercih edilmeli

---

## 7. Security Rules

- **Authentication & Authorization:** Laravel’in built-in mekanizmaları kullanılmalı
- **Input Validation:** Tüm formlar request validation ile doğrulanmalı
- **Secrets Management:** API key’ler `.env` dosyasında saklanmalı, kod tabanına girilmemeli
- **HTTPS:** Tüm ortamlar SSL zorunlu
- **OWASP Top 10:** En sık görülen güvenlik açıklarına karşı kontrol listesi uygulanmalı

---

## 8. Deployment Rules

- **Environments:** Dev, Staging, Production ayrımı net olacak
- **CI/CD:** Her commit testlerden geçmeden deploy edilmeyecek
- **Migrations:** Production ortamında migration rollback yasak, sadece forward migration
- **Monitoring:** Deploy sonrası sistem logları kontrol edilmeli

---

## 9. Collaboration & Communication

- **Issue Tracking:** Jira / Trello / GitHub Issues kullanılacak
- **Code Reviews:** PR’lar en geç 24 saat içinde incelenmeli
- **Stand-ups:** Günlük kısa durum güncellemesi yapılmalı

---

## 10. Exceptions & Notes

- Kurallara uyulamayacak özel durumlar burada belirlenecek
- [Örn. Çok acil bug fix durumunda test zorunluluğu atlanabilir, fakat sonraki sprintte eklenmeli]
