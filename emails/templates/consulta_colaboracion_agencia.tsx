import * as React from 'react';
import { Section, Text } from '@react-email/components';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { Card } from '../components/Card';
import { theme } from '../styles/theme';
import { mockCommonProps } from '../data/mockData';

interface AgencyCollaborationInquiryEmailProps {
  contactName?: string;
  companyName?: string;
  companyType?: string;
  websiteUrl?: string;
  senderName?: string;
  senderRole?: string;
  senderPhotoUrl?: string;
  senderEmail?: string;
  senderPhone?: string;
  supportEmail?: string;
}

export const AgencyCollaborationInquiryEmail = ({
  contactName = '{{CONTACT_NAME}}',
  companyName = '{{COMPANY_NAME}}',
  companyType = '{{COMPANY_TYPE}}',
  websiteUrl = '{{WEBSITE_URL}}',
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
}: AgencyCollaborationInquiryEmailProps) => {
  const previewText = `Nos gustaría explorar una colaboración con ${companyName}.`;

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Explorar una posible colaboración</SectionTitle>

          <Paragraph>
            Hola {contactName},
          </Paragraph>

          <Paragraph>
            Te escribo desde UKIYO, una agencia boutique especializada en viajes a medida y experiencias diseñadas con un enfoque muy cuidado, humano y personalizado.
          </Paragraph>

          <Paragraph>
            Hemos estado viendo lo que hacéis en <strong>{companyName}</strong>{companyType ? ` dentro de ${companyType}` : ''} y nos ha parecido que podría encajar muy bien con nuestra forma de entender los viajes.
          </Paragraph>

          <Paragraph>
            Por eso queríamos explorar la posibilidad de colaborar juntos y saber si trabajáis habitualmente con agencias de viaje o con proyectos afines como el nuestro.
          </Paragraph>

          <Section style={summaryBox}>
            <Text style={summaryEyebrow}>Información que nos ayudaría</Text>
            <Text style={summaryItem}>1. Si tenéis tarifas netas, comisiones o precios especiales para agencias.</Text>
            <Text style={summaryItem}>2. Qué requisitos o documentación soléis pedir para dar de alta una colaboración.</Text>
            <Text style={summaryItem}>3. Quién sería la persona o canal adecuado para avanzar en el proceso.</Text>
          </Section>

          <Paragraph>
            Si lo prefieres, también puedes echar un vistazo a nuestra web para conocer mejor la filosofía de UKIYO:
            {' '}
            <a href={websiteUrl} style={inlineLink}>{websiteUrl}</a>
          </Paragraph>

          <Paragraph>
            Quedo atento a tus comentarios. Será un placer valorar juntos si tiene sentido construir una relación de colaboración a medio y largo plazo.
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

export default AgencyCollaborationInquiryEmail;
