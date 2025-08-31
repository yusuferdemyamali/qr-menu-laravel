# Database Schema

## 1. General Information
- **Database Type:** ["MySql"]  
- **DBMS:** [MySQL]  
- **Connection Details:** [Opsiyonel, güvenlik nedeniyle şifreleri .env dosyasında sakla]  
- **Charset & Collation:** [utf8mb4_general_ci]  

---

## 2. Tables Overview


---

## 3. Relationships
- **One-to-Many:**  
  - product_categories → products


---

## 4. Columns & Data Types


> Opsiyonel: Projeye özel kolonlar burada eklenebilir.  

---

## 5. Indexes & Constraints
- **Primary Keys:** Tüm tablolar için `id`  
- **Foreign Keys:** Laravel migrations ile tanımlı  
- **Indexes:**  
  - Sık sorgulanan kolonlar için (örn. email, product_name)  
- **Unique Constraints:** email, username, SKU gibi benzersiz alanlar  

---

## 6. Migrations & Seeders
- Tüm tablolar Laravel migration ile oluşturulacak  
- Örnek veriler için seeders kullanılacak  
- Migration rollback kuralları: production ortamda yalnızca forward migration  

---

## 7. Backup & Maintenance
- Günlük otomatik backup planı  
- Yedekleme dosyaları güvenli bir sunucuda saklanacak  
- Restore prosedürü test edilmeli  

---

## 8. Notes
- Projede soft delete ve timestamp kullanımına karar verilmeli  
- Pivot tablolar ve polymorphic ilişkiler ihtiyaç doğrultusunda eklenebilir  
- Proje büyüdükçe index ve query optimizasyonları gözden geçirilmeli
