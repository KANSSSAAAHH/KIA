<?php
// konfirmasi.php
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pendaftaran Berhasil - KIA</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(180deg, #1e3a8a 0%, #3730a3 50%, #1e1b4b 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      position: relative;
      overflow-x: hidden;
    }
    
    .modal-container {
      position: relative;
      z-index: 10;
      width: 100%;
      max-width: 700px;
      animation: slideUp 0.8s ease-out;
    }
    
    @keyframes slideUp {
      0% {
        opacity: 0;
        transform: translateY(50px);
      }
      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .modal-box {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-radius: 24px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.2);
      overflow: hidden;
      text-align: center;
    }
    
    .modal-header {
      background: linear-gradient(180deg, #1e40af 0%, #1d4ed8 100%);
      color: white;
      padding: 40px 30px;
      position: relative;
      overflow: hidden;
    }
    
    .modal-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
      opacity: 0.3;
    }
    
    .modal-header h1 {
      font-size: 32px;
      font-weight: 700;
      position: relative;
      z-index: 1;
      text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .steps-container {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      gap: 0;
      padding: 40px 30px;
      flex-wrap: nowrap;
      background: linear-gradient(to right, #f8f9ff, #ffffff);
    }
    
    .step {
      display: flex;
      align-items: center;
      font-weight: 600;
      color: #4a5568;
      padding: 12px 20px;
      background: white;
      border-radius: 50px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.08);
      border: 2px solid #e2e8f0;
      position: relative;
    }
    
    .step.completed {
      border-color: #1d4ed8;
      background: linear-gradient(135deg, #dbeafe, #bfdbfe);
      color: #1e40af;
    }
    
    .step.current {
      border-color: #fbbf24;
      background: linear-gradient(135deg, #fef3c7, #fde68a);
      color: #92400e;
      animation: pulse 2s ease-in-out infinite;
    }
    
    .step.pending {
      border-color: #d1d5db;
      background: #f9fafb;
      color: #9ca3af;
    }
    
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.02); }
    }
    
    .step.completed::before {
      content: '✓';
      width: 30px;
      height: 30px;
      background: linear-gradient(135deg, #1d4ed8, #1e40af);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      font-weight: bold;
      font-size: 16px;
      box-shadow: 0 2px 8px rgba(29, 78, 216, 0.3);
    }
    
    .step.current::before {
      content: '−';
      width: 30px;
      height: 30px;
      background: linear-gradient(135deg, #f59e0b, #d97706);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      font-weight: bold;
      font-size: 20px;
      box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
    }
    
    .step.pending::before {
      content: '3';
      width: 30px;
      height: 30px;
      background: #e5e7eb;
      color: #9ca3af;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      font-weight: bold;
      font-size: 16px;
    }
    
    .connector {
      width: 80px;
      height: 4px;
      border-radius: 2px;
      position: relative;
      overflow: hidden;
      margin: 0 10px;
    }
    
    .connector.completed {
      background: linear-gradient(90deg, #1d4ed8, #1e40af);
    }
    
    .connector.pending {
      background: #e5e7eb;
    }
    
    .connector::after {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: rgba(255,255,255,0.5);
      animation: shimmer 2s ease-in-out infinite;
    }
    
    @keyframes shimmer {
      0% { left: -100%; }
      100% { left: 100%; }
    }
    
    .info-card {
      margin: 20px 40px;
      padding: 20px;
      background: linear-gradient(135deg, #dbeafe, #bfdbfe);
      border: 1px solid #1d4ed8;
      border-radius: 15px;
      color: #1e40af;
      font-weight: 600;
      animation: fadeInUp 0.6s ease-out 1s both;
    }
    
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    .success-section {
      padding: 50px 40px;
      background: linear-gradient(to bottom, #ffffff, #f8f9ff);
    }
    
    .success-icon {
      width: 120px;
      height: 120px;
      background: linear-gradient(135deg, #48bb78, #38a169);
      border-radius: 50%;
      margin: 0 auto 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 30px rgba(72, 187, 120, 0.3);
      animation: bounce 1s ease-out;
      position: relative;
    }
    
    @keyframes bounce {
      0%, 20%, 53%, 80%, 100% {
        transform: translateY(0);
      }
      40%, 43% {
        transform: translateY(-20px);
      }
      70% {
        transform: translateY(-10px);
      }
      90% {
        transform: translateY(-4px);
      }
    }
    
    .success-icon::before {
      content: '✓';
      font-size: 60px;
      color: white;
      font-weight: bold;
      text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .success-icon::after {
      content: '';
      position: absolute;
      top: -10px;
      left: -10px;
      right: -10px;
      bottom: -10px;
      border-radius: 50%;
      border: 3px solid rgba(72, 187, 120, 0.2);
      animation: ring 2s ease-in-out infinite;
    }
    
    @keyframes ring {
      0% {
        transform: scale(1);
        opacity: 1;
      }
      100% {
        transform: scale(1.2);
        opacity: 0;
      }
    }
    
    .success-content h2 {
      color: #2d3748;
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 20px;
      line-height: 1.3;
    }
    
    .success-content p {
      color: #4a5568;
      font-size: 18px;
      line-height: 1.6;
      margin-bottom: 40px;
      max-width: 500px;
      margin-left: auto;
      margin-right: auto;
    }
    
    .btn-wrapper {
      margin-top: 20px;
    }
    
    .btn-ok {
      padding: 18px 50px;
      background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%);
      color: white;
      border: none;
      border-radius: 50px;
      font-size: 18px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: 0 8px 25px rgba(30, 64, 175, 0.3);
      position: relative;
      overflow: hidden;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    
    .btn-ok::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }
    
    .btn-ok:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(30, 64, 175, 0.4);
    }
    
    .btn-ok:hover::before {
      left: 100%;
    }
    
    .btn-ok:active {
      transform: translateY(-1px);
    }
    
    /* Responsive Design */
    @media (max-width: 768px) {
      .modal-header h1 {
        font-size: 24px;
      }
      
      .steps-container {
        flex-direction: column;
        gap: 15px;
        padding: 30px 20px;
      }
      
      .connector {
        width: 4px;
        height: 30px;
      }
      
      .success-section {
        padding: 40px 20px;
      }
      
      .success-content h2 {
        font-size: 22px;
      }
      
      .success-content p {
        font-size: 16px;
      }
      
      .btn-ok {
        padding: 16px 40px;
        font-size: 16px;
      }
      
      .info-card {
        margin: 20px;
        padding: 15px;
        font-size: 14px;
      }
    }
    
    @media (max-width: 480px) {
      .modal-header {
        padding: 30px 20px;
      }
      
      .modal-header h1 {
        font-size: 20px;
      }
      
      .step {
        padding: 10px 15px;
        font-size: 14px;
      }
      
      .success-icon {
        width: 100px;
        height: 100px;
      }
      
      .success-icon::before {
        font-size: 50px;
      }
      
      .success-content h2 {
        font-size: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="modal-container">
    <div class="modal-box">
      <div class="modal-header">
        <h1>Formulir Pendaftaran KIA</h1>
      </div>
      
      <div class="steps-container">
        <div class="step completed">
          Form Data
        </div>
        <div class="connector completed"></div>
        <div class="step current">
          Data Pengambilan
        </div>
        <div class="connector pending"></div>
        <div class="step pending">
          Selesai
        </div>
      </div>
      
      <div class="info-card">
        <p>Langkah 1 dari 3 telah selesai. Silakan lanjutkan ke tahap berikutnya.</p>
      </div>
      
      <div class="success-section">
        <div class="success-icon"></div>
        <div class="success-content">
          <h2>Selamat! Pendaftaran Berhasil</h2>
          <p>Data Anda telah tersimpan dengan aman.<br>Silakan lanjutkan untuk mengisi form pengambilan KIA.</p>
        </div>
        <div class="btn-wrapper">
          <form method="post" action="pengambilan.php">
  <input type="hidden" name="pengambilan" value="lanjut">
  <button type="submit" class="btn-ok">➤ Lanjut ke Pengambilan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>