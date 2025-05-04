<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <title>Hydrax - Recuperação de Senha</title>
  </head>
  <body style="margin:0; padding:0; background: linear-gradient(135deg, #1e1e2f, #2a0e5a, #1e2566); font-family: Arial, sans-serif; color: white;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #1e1e2f; padding: 40px 0;">
      <tr>
        <td align="center">
          <table width="600" cellpadding="0" cellspacing="0" style="background-color: #00000088; border-radius: 12px; overflow: hidden; box-shadow: 0 0 20px rgba(30,64,175,0.4);">
            
            <!-- Cabeçalho -->
            <tr>
              <td style="padding: 30px; text-align: center; background: linear-gradient(to right, #6366f1, #a855f7, #ffffff20);">
                <h1 style="margin: 0; font-size: 28px; font-family: 'Orbitron', sans-serif; color: white;">Hydrax</h1>
                <p style="margin: 5px 0 0; font-size: 14px; color: #d1d5db;">Recuperação de Senha</p>
              </td>
            </tr>

            <!-- Corpo -->
            <tr>
              <td style="padding: 30px; background-color: #0f172a;">
                <h2 style="color: #93c5fd; margin-bottom: 15px;">Olá,</h2>
                <p style="margin-bottom: 20px; line-height: 1.6; color: #e5e7eb;">
                  Você solicitou a recuperação da sua senha no <strong>Hydrax</strong>. Use o código abaixo para redefinir sua senha:
                </p>

                <!-- Código -->
                <div style="background-color: #1e40af; color: white; font-size: 24px; letter-spacing: 4px; text-align: center; padding: 15px 0; border-radius: 10px; margin: 30px 0; font-weight: bold;">
                  {{ $token }}
                </div>

                <p style="margin-bottom: 20px; line-height: 1.6; color: #dbeafe;">
                  Este código expira em 10 minutos. Se você não solicitou esta recuperação, ignore este e-mail.
                </p>

                <p style="font-size: 13px; color: #9ca3af;">Obrigado,<br />Equipe Hydrax</p>
              </td>
            </tr>

            <!-- Rodapé -->
            <tr>
              <td style="padding: 20px; text-align: center; background-color: #1e293b; font-size: 12px; color: #9ca3af;">
                &copy; 2025 Hydrax - Todos os direitos reservados<br />
                <a href="#" style="color: #818cf8; text-decoration: none;">www.hydrax.com</a>
              </td>
            </tr>

          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
