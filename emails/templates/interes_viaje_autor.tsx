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

interface ViajeAutorInterestEmailProps {
  clientName?: string;
  tripName?: string;
  whatsappUrl?: string;
  websiteUrl?: string;
  senderName?: string;
  senderRole?: string;
  senderPhotoUrl?: string;
  senderEmail?: string;
  senderPhone?: string;
  supportEmail?: string;
}

export const ViajeAutorInterestEmail = ({
  clientName = '{{CLIENT_NAME}}',
  tripName = '{{TRIP_NAME}}',
  whatsappUrl = '{{WHATSAPP_URL}}',
  websiteUrl = '{{WEBSITE_URL}}',
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
}: ViajeAutorInterestEmailProps) => {
  const previewText = 'Gracias por tu interés en esta aventura de UKIYO.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Gracias por tu interés en esta aventura.</SectionTitle>

          <Paragraph>
            Hola {clientName},
          </Paragraph>

          <Paragraph>
            He recibido tu solicitud de información para <strong>{tripName}</strong>. Qué alegría saber que esta propuesta
            ha conectado contigo.
          </Paragraph>

          <Paragraph>
            Soy Víctor, fundador de UKIYO. Estos viajes son muy especiales para nosotros porque están pensados para viajar
            con calma, en grupos reducidos y con un nivel de cuidado muy alto en cada detalle.
          </Paragraph>

          <Section style={featureBox}>
            <Text style={featureEyebrow}>Qué puedes esperar</Text>
            <Text style={featureItem}>Grupos pequeños y plazas limitadas para vivir el destino con profundidad.</Text>
            <Text style={featureItem}>Acompañamiento cercano y resolución de dudas antes de reservar.</Text>
            <Text style={featureItem}>Una experiencia muy cuidada, diseñada para viajeros que buscan algo especial.</Text>
          </Section>

          <Paragraph>
            Me pondré en contacto contigo muy pronto para resolver tus dudas, comentarte disponibilidad y ver si este viaje
            encaja de verdad contigo o con tu grupo.
          </Paragraph>

          <CTAButton href={whatsappUrl}>
            Hablar por WhatsApp
          </CTAButton>

          <Paragraph secondary={true}>
            Si lo prefieres, también puedes seguir explorando nuestros viajes desde aquí:{' '}
            <a href={websiteUrl} style={inlineLink}>{websiteUrl}</a>
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

const featureBox = {
  backgroundColor: theme.colors.surface,
  border: `1px solid ${theme.colors.border}`,
  borderRadius: theme.radius.md,
  padding: '24px',
  margin: '28px 0',
};

const featureEyebrow = {
  margin: '0 0 12px 0',
  color: theme.colors.primaryDark,
  fontSize: '12px',
  lineHeight: '18px',
  fontWeight: '700',
  letterSpacing: '0.12em',
  textTransform: 'uppercase' as const,
};

const featureItem = {
  margin: '0 0 10px 0',
  color: theme.colors.textMain,
  fontSize: '15px',
  lineHeight: '24px',
};

const inlineLink = {
  color: theme.colors.primaryDark,
  textDecoration: 'none',
};

export default ViajeAutorInterestEmail;
