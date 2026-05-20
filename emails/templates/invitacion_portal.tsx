import * as React from 'react';
import { Section, Text } from '@react-email/components';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { CTAButton } from '../components/CTAButton';
import { Card } from '../components/Card';
import { theme } from '../styles/theme';
import { mockCommonProps } from '../data/mockData';

interface PortalInvitationEmailProps {
  clientName?: string;
  tripTitle?: string;
  activationUrl?: string;
  portalUrl?: string;
  senderName?: string;
  senderRole?: string;
  senderPhotoUrl?: string;
  senderEmail?: string;
  senderPhone?: string;
  supportEmail?: string;
}

export const PortalInvitationEmail = ({
  clientName = '{{CLIENT_NAME}}',
  tripTitle = '{{TRIP_TITLE}}',
  activationUrl = '{{ACTIVATION_URL}}',
  portalUrl = '{{PORTAL_URL}}',
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
}: PortalInvitationEmailProps) => {
  const previewText = 'Tu acceso al Portal del Aventurero de UKIYO ya está listo.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Tu Portal del Aventurero ya está listo, {clientName}.</SectionTitle>

          <Paragraph>
            Hemos preparado tu acceso privado para que tengas en un solo lugar toda la información importante de tu viaje.
            {tripTitle ? ` A partir de ahora podrás consultar fácilmente los detalles de ${tripTitle}.` : ''}
          </Paragraph>

          <Paragraph>
            Dentro del portal encontrarás documentación, itinerario, recomendaciones seleccionadas por UKIYO y los contactos
            de apoyo que necesitas antes y durante la ruta.
          </Paragraph>

          <CTAButton href={activationUrl}>
            Activar acceso al portal
          </CTAButton>

          <Section style={summaryBox}>
            <Text style={summaryEyebrow}>Qué hacer ahora</Text>
            <Text style={summaryItem}>1. Abre el enlace de activación y define tu contraseña.</Text>
            <Text style={summaryItem}>2. Accede a tu portal privado desde el enlace inferior.</Text>
            <Text style={summaryItem}>3. Guarda el acceso para consultar tu viaje siempre que lo necesites.</Text>
          </Section>

          <Paragraph secondary={true}>
            Enlace directo al portal: <a href={portalUrl} style={inlineLink}>{portalUrl}</a>
          </Paragraph>

          <Paragraph secondary={true} style={{ marginBottom: '0' }}>
            Si no esperabas este correo o necesitas ayuda con el acceso, responde a este email y te ayudamos.
          </Paragraph>

          <SignatureBlock
            name={senderName}
            role={senderRole}
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} />
    </EmailLayout>
  );
};

const summaryBox = {
  backgroundColor: theme.colors.surface,
  border: `1px solid ${theme.colors.border}`,
  borderRadius: theme.radius.md,
  padding: '24px',
  margin: '28px 0',
};

const summaryEyebrow = {
  margin: '0 0 12px 0',
  color: theme.colors.primaryDark,
  fontSize: '12px',
  lineHeight: '18px',
  fontWeight: '700',
  letterSpacing: '0.12em',
  textTransform: 'uppercase' as const,
};

const summaryItem = {
  margin: '0 0 10px 0',
  color: theme.colors.textMain,
  fontSize: '15px',
  lineHeight: '24px',
};

const inlineLink = {
  color: theme.colors.primaryDark,
  textDecoration: 'none',
};

export default PortalInvitationEmail;
