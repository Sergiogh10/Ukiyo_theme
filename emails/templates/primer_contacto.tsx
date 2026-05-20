import * as React from 'react';
import { Link, Section, Text } from '@react-email/components';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { CTAButton } from '../components/CTAButton';
import { ContactBlock } from '../components/ContactBlock';
import { Card } from '../components/Card';
import { SummaryBox } from '../components/SummaryBox';
import { CommonEmailProps, mockCommonProps, mockUrls } from '../data/mockData';
import { theme } from '../styles/theme';

interface PrimerContactoEmailProps extends CommonEmailProps {
  scheduleLink?: string;
  whatsappLink?: string;
  websiteUrl?: string;
}

export const PrimerContactoEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  scheduleLink = mockUrls.proposalUrl,
  whatsappLink = 'https://wa.me/message/CS2LNI6YHSETO1',
  websiteUrl = 'https://viajesukiyo.com',
}: PrimerContactoEmailProps) => {
  const previewText =
    'Gracias por escribirnos. Empezamos a diseñar tu viaje cuando quieras.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Qué ilusión leerte, {clientName}.</SectionTitle>
          <Paragraph>
            Gracias por escribirnos y por pensar en <strong>UKIYO</strong> para
            tu próximo viaje. Me alegra mucho saber que te atrae la idea de
            vivir una experiencia más auténtica, diseñada con calma y sentido.
          </Paragraph>
          <Paragraph>
            Soy <strong>{senderName}</strong> y me encargo personalmente de los
            primeros contactos. Antes de enviarte una propuesta cerrada, me
            gusta entender bien qué imagináis: qué ritmo os apetece, qué tipo
            de lugares os atraen y cómo queréis sentiros durante el viaje.
          </Paragraph>
          <Paragraph>
            Si te encaja, podemos hacer una llamada breve de 15 a 20 minutos.
            Suele ser la manera más sencilla de aterrizar vuestra idea y
            empezar a construir un viaje que realmente se sienta vuestro.
          </Paragraph>

          <SummaryBox>
            <Text style={summaryTitle}>Lo que cuidamos desde el principio</Text>

            <Section style={featureItem}>
              <Text style={featureHeading}>Viaje diseñado para ti</Text>
              <Text style={featureText}>
                No partimos de paquetes cerrados. Construimos cada propuesta a
                partir de vuestra forma de viajar, con equilibrio entre
                descubrimiento, descanso y autenticidad.
              </Text>
            </Section>

            <Section style={featureItem}>
              <Text style={featureHeading}>
                Experiencias reales, lejos del turismo masivo
              </Text>
              <Text style={featureText}>
                Trabajamos con personas y equipos locales que conocen el destino
                de verdad, para abrir puertas y crear una experiencia más
                honesta y conectada con el lugar.
              </Text>
            </Section>

            <Section>
              <Text style={featureHeading}>Acompañamiento claro y cercano</Text>
              <Text style={featureTextLast}>
                Desde este primer correo hasta el regreso, cuidamos los
                detalles, resolvemos dudas y os acompañamos con transparencia en
                cada paso del proceso.
              </Text>
            </Section>
          </SummaryBox>

          <CTAButton href={scheduleLink}>Reservar una primera llamada</CTAButton>

          <Paragraph style={{ marginBottom: '12px' }}>
            Si prefieres algo más ágil, también puedes escribirme por{' '}
            <Link href={whatsappLink} style={linkStyle}>
              WhatsApp
            </Link>{' '}
            o responder directamente a este correo.
          </Paragraph>

          <Paragraph secondary style={{ marginBottom: '0' }}>
            También puedes seguir explorando nuestra forma de viajar en{' '}
            <Link href={websiteUrl} style={linkStyle}>
              viajesukiyo.com
            </Link>
            .
          </Paragraph>

          <ContactBlock
            supportEmail={supportEmail}
            supportPhone={senderPhone}
          />

          <SignatureBlock
            name={senderName}
            role={senderRole}
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} supportPhone={senderPhone} />
    </EmailLayout>
  );
};

export default PrimerContactoEmail;

const summaryTitle = {
  margin: '0 0 20px 0',
  fontSize: '16px',
  lineHeight: '24px',
  fontWeight: '600',
  color: theme.colors.primaryDark,
  fontFamily: theme.fonts.main,
};

const featureItem = {
  paddingBottom: '16px',
  marginBottom: '16px',
  borderBottom: `1px solid ${theme.colors.border}`,
};

const featureHeading = {
  margin: '0 0 6px 0',
  fontSize: '15px',
  lineHeight: '22px',
  fontWeight: '600',
  color: theme.colors.textMain,
  fontFamily: theme.fonts.main,
};

const featureText = {
  margin: '0',
  fontSize: '14px',
  lineHeight: '22px',
  color: theme.colors.textSecondary,
  fontFamily: theme.fonts.main,
};

const featureTextLast = {
  ...featureText,
  marginBottom: '0',
};

const linkStyle = {
  color: theme.colors.primaryDark,
  textDecoration: 'underline',
  fontWeight: '500',
};
